<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfilePhotoRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\MediaRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $path = 'images/customers/';
    public function updateProfile(UserRequest $request)
    {
        $user = (new UserRepository())->updateByRequest($request);
        return $this->json('Profile is updated successfully', [
            'user' => (new UserResource($user))
        ]);
    }

    public function updateProfilePhoto(ProfilePhotoRequest $request)
    {

        $user = auth()->user();

        if ($request->hasFile('profile_photo')) {
            $thumbnail = (new MediaRepository())->updateOrCreateByRequest(
                $request->profile_photo,
                $this->path,
                'image',
                $user->media
            );
        }

        $user->update([
            'media_id' => $thumbnail->id
        ]);

        $updateUser = User::find($user->id);

        return $this->json('Profile photo is updated successfully', [
            'user' => (new UserResource($updateUser))
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = (new UserRepository())->changePasswordByRequest($request, auth()->user());
        if ($user) {
            return $this->json('Password change successfully', [
                'user' => (new UserResource($user))
            ]);
        }
        return $this->json('Incurrect password', [], Response::HTTP_BAD_REQUEST);
    }
}
