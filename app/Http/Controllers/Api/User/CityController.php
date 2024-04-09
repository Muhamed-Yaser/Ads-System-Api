<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $cities = City::all();
        if ($cities) return ApiResponse::success(200, 'Cities retrived successfully', CityResource::collection($cities));
        else return ApiResponse::error(200, 'No cities found', []);
    }
}