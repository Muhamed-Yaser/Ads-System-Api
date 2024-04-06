<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserLoginResource;
use App\Http\Resources\UserRegisterResource;

class UserAuthService
{
    public function RegisterUser(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            //'password'=>Hash::make($request->password),
        ]);

        return ApiResponse::success(201, 'User registered Successfully', new UserRegisterResource($user));
    }

    public function loginUser(LoginRequest $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            return ApiResponse::success(200, 'User Logined Successfully', new UserLoginResource($user));
        } else {
            return ApiResponse::success(401, 'User data not found', []);
        }
    }

    public function logoutUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::success(200, 'User Logout Successfully', []);
    }
}