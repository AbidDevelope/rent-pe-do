<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Http\Requests\ReSendOtpRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\UserRepository;
use App\Repositories\verificationCodeRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    private $verificationCodeRepo;
    private $userRepo;

    public function __construct(verificationCodeRepository $verificationCodeRepository, UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
        $this->verificationCodeRepo = $verificationCodeRepository;
    }

    public function forgotPassword(ReSendOtpRequest $request)
    {
        $contact = formatMobile($request->contact);
        $user = $this->userRepo->findByContact($contact);
        if ($user) {
            $verifiactionCode = $this->verificationCodeRepo->findOrCreateByContact($contact);

            $message = !app()->environment('production') ? 'We sent otp to your contact number (OTP = ' . $verifiactionCode->otp . ')' : 'We sent otp to your contact number';

            return $this->json($message);
        }
        return $this->json('Sorry! No user found with this contact number.', [], Response::HTTP_BAD_REQUEST);
    }

    public function verifyOtp(OTPRequest $request)
    {
        $contact = formatMobile($request->contact);
        $user = $this->userRepo->findByContact($contact);

        $verifiactionCode = $this->verificationCodeRepo->findOrCreateByContact($contact,$request->otp);

        if (!is_null($user) && $verifiactionCode) {
            return $this->json('OTP matched successfully', [
                'token' => $verifiactionCode->token
            ]);
        }

        if (!$verifiactionCode){
            return $this->json('Invalid OTP', [], Response::HTTP_BAD_REQUEST);
        }

        return $this->json('Sorry! No user found with this contact number.', [], Response::HTTP_BAD_REQUEST);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $verifyCode = $this->verificationCodeRepo->checkByToken($request->token);

        if (!$verifyCode) {
            return $this->json('Invalid token', [], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->userRepo->findByContact($verifyCode->phone);

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            $verifyCode->delete();
            return $this->json('Password reset successfully');
        }
        return $this->json('Sorry! No user found with this contact number.', [], Response::HTTP_BAD_REQUEST);
    }


}
