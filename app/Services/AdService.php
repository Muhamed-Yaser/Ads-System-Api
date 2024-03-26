<?php

namespace App\Services;

use Exception;
use App\Models\Ad;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\Adrequest;
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
        Ad::create($data);
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


        return $this->success([], __('site.Ad updated successfully'), 200);
    }

    public function destroyAd($adId)
    {
        $ad = Ad::whereId($adId)->first();

        abort_if(auth()->user()->id != $ad->user_id, 403, __('site.You are not allalowed to delete this ad.'));

        $ad->delete();
    }
}
