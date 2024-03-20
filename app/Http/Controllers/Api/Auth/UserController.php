<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserLoginResource;
use App\Http\Resources\UserRegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            //'password'=>Hash::make($request->password),
        ]);

        return ApiResponse::success(201 , 'User registered Successfully', new UserRegisterResource($user));
    }


    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email ,'password'=> $request->password])){
            $user = Auth::user();

            return ApiResponse::success(200 , 'User Logined Successfully', new UserLoginResource($user));
        }else
        {
            return ApiResponse::success(401 , 'User data not found',[]);
        }
    }

    public function logout(Request $request)
    {
            $request->user()->currentAccessToken()->delete();
            return ApiResponse::success(200 , 'User Logout Successfully' , []);

    }


}