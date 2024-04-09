<?php

namespace App\Services\AdminServices;

use Exception;
use App\Models\Ad;
use App\Helpers\ApiResponse;
use App\Http\Requests\Adrequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AdResource;
use Illuminate\Support\Facades\DB;

class AdService
{
    public function index()
    {
        $ads = Ad::paginate(15);
        return view('Dashboard.index', compact('ads'));
    }

    public function destroy($adId)
    {
        $ad = Ad::whereId($adId)->first();

        $ad->delete();

        return redirect()->route('Dashboard.index');
    }
}