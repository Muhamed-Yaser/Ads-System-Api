<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class DistrictController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get all districts from database
        $districts = District::where('city_id' , $request->input('city'))->get();

        if (count($districts) > 0) return ApiResponse::success(200 , 'Distirics retrived successfully' , DistrictResource::collection($districts));
        else  return ApiResponse::error(200 , 'These city distirics are empty' , []);

    }
}
