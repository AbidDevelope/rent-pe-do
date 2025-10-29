<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|unique:users,email',
            'address' => 'required|string',
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json([
            'status' => false,
            'message' => 'User Register Successfully',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $credentials = $request->only('email', 'password');
        if(!$token = JWTAuth::attempt($credentials))
        {
           return response()->json([
            'status' => false,
            'message' => 'Invalid email or Password'
           ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'User Login Successfully',
            'token' => $token
        ], 200);
    }
}
