<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adrequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Services\AdService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Api;

class AdController extends Controller
{
    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {
        return $this->adService->index();
    }

    public function store(Adrequest $request)
    {
        $ad = $this->adService->storeAd($request);

        if ($ad) return ApiResponse::success(201, 'Ad created', new AdResource($ad));
    }

    public function show()
    {
        return $this->adService->show();
    }

    public function update(Adrequest $request, $adId)
    {
        //$this->adService->updateAd($request,  $adId);
        $ad = Ad::findOrFail($adId);
        if ($ad->user_id != auth()->user()->id)  return ApiResponse::error(403, 'You are not allwoed to do this action', []);

        $data = $request->validated();
        $updatedAd = $ad->update($data);

        if ($updatedAd) return ApiResponse::success(201, 'Updated successfully',new AdResource($ad));
    }

    public function destroy($adId)
    {
        $deletRecord = $this->adService->destroyAd($adId);

        if ($deletRecord) return  ApiResponse::success(200, 'Deleted Successfully', []);
    }
}