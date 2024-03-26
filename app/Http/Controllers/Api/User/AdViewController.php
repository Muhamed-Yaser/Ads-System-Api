<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Ad;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Resources\AdResource;
use App\Http\Controllers\Controller;
use App\Services\AdViewService;

class AdViewController extends Controller
{
    protected $adViewService;

    public function __construct(AdViewService $adViewService)
    {
        $this->adViewService = $adViewService;
    }


    public function latest()
    {
        $ads = Ad::latest()->take(3)->get();
        if (count($ads) > 0) return ApiResponse::success(200, 'Lastes ads retrived successfully', AdResource::collection($ads));
        else return ApiResponse::error(200, 'There are no Lastes ads', []);
    }


    public function group($group_id)
    {
        $ads = Ad::where('group_id', $group_id)->paginate(2);

        if (count($ads) > 0) return ApiResponse::success(200, 'Ads retrieved successfully', AdResource::collection($ads));

        else return ApiResponse::error(200, 'No ads found for the specified category', []);
    }


    public function search(Request $request)
    {

        $searchAd = $request->has('search') ?  $request->input('search') : null;

        $ads = Ad::when($searchAd != null, function ($query) use ($searchAd) {
            $query->where('title', 'like', '%' . $searchAd . '%');
        })->latest()->get();

        if (count($ads) > 0) return ApiResponse::success(200, 'Search compelete', AdResource::collection($ads));

        else return ApiResponse::error(200, 'No matching search', []);
    }
}