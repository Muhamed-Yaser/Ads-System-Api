<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __invoke()
    {
        $settings = Setting::find(17);
        if ($settings) return ApiResponse::success(200, 'settings retrived successfully', new SettingResource($settings));
        else return ApiResponse::error(200, 'settings not found',  []);


        //return ApiResource::collection($settings);
    }

}
