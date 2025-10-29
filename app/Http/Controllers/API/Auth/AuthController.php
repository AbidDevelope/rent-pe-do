<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ReSendOtpRequest;
use App\Http\Resources\UserResource;
use App\Repositories\DeviceKeyRepository;
use App\Repositories\UserRepository;
use App\Repositories\verificationCodeRepository;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * @var userRepo
     *  
     * Assign from UserRepository 
     */
    private $userRepo;
    private $verificationCodeRepo;

    public function __construct(UserRepository $userRepository, verificationCodeRepository $verificationCodeRepository)
    {
        $this->userRepo = $userRepository;
        $this->verificationCodeRepo = $verificationCodeRepository;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->authenticate($request);

        if($user){
            if ($request->device_key) {
                (new DeviceKeyRepository())->storeByRequest($user->customer, $request);
            }
            return $this->json('Sign In Successful', [
                'user' => (new UserResource($user)),
                'access' => $this->userRepo->getAccessToken($user)
            ]);
        }
        return $this->json('Credential is invalid!', [], Response::HTTP_BAD_REQUEST);
    }

    private function authenticate(LoginRequest $request)
    {
        $user = $this->userRepo->findApproveByContact($request->contact);

        if(!is_null($user) && Hash::check($request->password, $user->password)){
            return $user;
        }
        return false;
    } 

    public function register(RegistrationRequest $request)
    {
        $contact = \formatMobile($request->contact);
        $user = $this->userRepo->registerUser($request);

        $user->assignRole('customer');

        return $this->json('Registration successfully complete' , [
            'user' => new UserResource($user),
            'access' => $this->userRepo->getAccessToken($user)
        ]);
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $user->token()->revoke();
            return $this->json('Logged out successfully!');
        }
        return $this->json('No Logged in user found', [], Response::HTTP_UNAUTHORIZED);
    }

    public function mobileVerify(OTPRequest $request)
    {
        $contact = \formatMobile($request->contact);
        $user = $this->userRepo->findByContact($contact);
        $verificationCode = $this->verificationCodeRepo->checkCode($contact,$request->otp);

        if (!is_null($user) && $verificationCode) {
            $verificationCode->delete();
            $user->update([
                'phone_verified_at' => now()
            ]);
            return $this->json('Mobile verification complete', [
                'user' => new UserResource($user)
            ]);
        }
        return $this->json('Invalid OTP or contact!', [], Response::HTTP_BAD_REQUEST);
    }

    public function resendOTP(ReSendOtpRequest $request)
    {
        $contact = \formatMobile($request->contact);
        $user = $this->userRepo->findByContact($contact);

        if($user){
            $verificationCode = $this->verificationCodeRepo->findOrCreateByContact($contact);
            $message = !app()->environment('production') ? 'Verification code is resent success to your contact (OTP = ' . $verificationCode->otp . ')' : 'Verification code is resent success to your contact';

            return $this->json($message);
        }

        return $this->json('Sorry, your contact is not found!',[], Response::HTTP_BAD_REQUEST);
    }
}
