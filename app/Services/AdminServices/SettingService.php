<?php

namespace App\Services\AdminServices;

use Exception;
use App\Helpers\ApiResponse;
use App\Http\Requests\Adrequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AdResource;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingService
{
    public function index()
    {
        $settings = Setting::all();
        return view('Dashboard.Setting.settings', compact('settings'));
    }

    public function updateAllSettings($request , $settingId)
    {
        $data = $request->validated();
        // $settings = Setting::all();
        // $settings->updateOrCreate($data);
        // $settings->save();

        $settings = Setting::firstOrNew(['id' => $settingId]);
        $settings->fill($data);
        $settings->save();

        if ($settings) return redirect()->route('settings', compact('settings'));
    }
}