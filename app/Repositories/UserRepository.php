<?php

namespace App\Repositories;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    private $path = 'images/customers/';
    public function model()
    {
        return User::class;
    }

    public function findApproveByContact($contact)
    {
        return $this->model()::where('phone', $contact)->isApprove()->first();
    }

    public function getAccessToken(User $user)
    {
        $token = $user->createToken('user token');
        return [
            'auth_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => $token->token->expires_at->format('Y-m-d H:i:s'),
        ];
    }

    public function registerUser(RegistrationRequest $request)
    {
        $thumbnail = null;
        if ($request->hasFile('profile_photo')) {
            $thumbnail = (new MediaRepository())->storeByRequest(
                $request->profile_photo,
                $this->path,
                'customer images',
                'image'
            )->id;
        }
        
        $user = $this->model()::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->contact,
            'additional_phone' => $request->additional_contact,
            'password' => Hash::make($request->password),
            'media_id' =>  $thumbnail,
            'is_approved' => true,
        ]);

        (new CustomerRepository())->storeByUser($user);

        return $user;
    }

    public function findByContact($contact)
    {
        return $this->model()::where('phone', $contact)
            ->orWhere('email', $contact)
            ->first();
    }

    public function updateByRequest($request)
    {
        $user = auth()->user();
        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->contact,
            "additional_phone" => $request->additional_contact,
            "email" => $request->email
        ]);

        return $user;
    }

    public function changePasswordByRequest(ChangePasswordRequest $request,$user)
    {
        $currentPassword = $request->current_password;
        if (Hash::check($currentPassword,$user->password)) {
           $user->update([
               'password' => Hash::make($request->password)
           ]);
           return $user;
        }
        return;
    }

}
