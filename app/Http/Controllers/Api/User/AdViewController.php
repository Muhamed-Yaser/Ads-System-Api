<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Ad;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Resources\AdResource;
use App\Http\Controllers\Controller;
use App\Services\UserServices\AdViewService;

class AdViewController extends Controller
{
    protected $adViewService;

    public function __construct(AdViewService $adViewService)
    {
        $this->adViewService = $adViewService;
    }


    public function latest()
    {
        return $this->adViewService->latestAd();
    }


    public function group($group_id)
    {
        return $this->adViewService->gruopAd($group_id);
    }


    public function search(Request $request)
    {
        return $this->adViewService->searchAd($request);
    }
}