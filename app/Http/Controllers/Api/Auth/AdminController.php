<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\AdminAuthRequest;
use App\Services\AdminServices\AdminAuthService;

class AdminController extends Controller
{
    protected $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }

    public function loginPage()
    {
        return view('auth/login');
    }

    public function login(AdminAuthRequest $request)
    {
        return $this->adminAuthService->loginAdmin($request);
    }

    public function adminAuthenticated()
    {
        return $this->adminAuthService->checkAuthenticated();
    }

    public function profile()
    {
        return $this->adminAuthService->profileAdmin();
    }

    public function editProfile()
    {
        return $this->adminAuthService->editProfileAdmin();
    }

    public function updateProfile(AdminAuthRequest $request)
    {
        return $this->adminAuthService->updateProfileAdmin($request);
    }
}