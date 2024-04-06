<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserServices\UserAuthService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userAuthService;

    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function register(RegisterRequest $request)
    {
        return $this->userAuthService->RegisterUser($request);
    }


    public function login(LoginRequest $request)
    {
        return $this->userAuthService->loginUser($request);
    }

    public function logout(Request $request)
    {
        return $this->userAuthService->logoutUser($request);
    }
}