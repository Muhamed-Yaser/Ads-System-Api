<?php

namespace App\Services\UserServices;

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

    use ApiResponseTrait;

    public function index()
    {
        return  Ad::paginate(15) ?? [];
    }

    public function storeAd($request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $ad =  Ad::create($data);

       if ($ad) return ApiResponse::success(201, 'Ad created', new AdResource($ad));
    }

    public function show()
    {
        return  Ad::where('user_id', auth()->user()->id)->paginate(10) ?? [];
    }

    public function updateAd($request, $adId): JsonResponse
    {
        $adIdExists = DB::table('ads')->where('id', $adId)->exists();

        if (!$adIdExists) {

            return $this->error(__('site.Ad not found'), 404);
        }

        $ad = Ad::findOrFail($adId);

        abort_if(auth()->user()->id != $ad->user_id, 403, __('site.You are not allalowed to edit this ad.'));

        $data = $request->validated();

        $ad->update($data);


        return $this->success(200, __('site.Ad updated successfully'), []);
    }

    public function destroyAd($adId)
    {
        $ad = Ad::whereId($adId)->first();

        abort_if(auth()->user()->id != $ad->user_id, 403, __('site.You are not allalowed to delete this ad.'));

        $deletRecord =  $ad->delete();

        if ($deletRecord) return  ApiResponse::success(200, 'Deleted Successfully', []);
    }
}