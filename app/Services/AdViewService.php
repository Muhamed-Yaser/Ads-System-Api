<?php
namespace App\Services;

use App\Models\Ad;
use App\Helpers\ApiResponse;
use App\Http\Requests\Adrequest;
use App\Http\Resources\AdResource;

class AdViewService {
    public function latest() {

        // $ads = Ad::latest()->take(3)->get();
        // if (count($ads) > 0) return ApiResponse::success(200, 'Lastes ads retrived successfully', AdResource::collection($ads));
        // else return ApiResponse::error(200, 'There are no Lastes ads', []);
    }
}
