<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\EditSettingRequest;
use App\Services\AdminServices\SettingService;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        return $this->settingService->index();
    }

    public function updateSettings(EditSettingRequest $request , $settingId)
    {
        return $this->settingService->updateAllSettings($request , $settingId);
    }
}