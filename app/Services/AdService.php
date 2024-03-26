<?php

namespace App\Services;

use App\Models\Ad;
use App\Helpers\ApiResponse;
use App\Http\Requests\Adrequest;
use App\Http\Resources\AdResource;

class AdService
{

    public function index()
    {
        $ads = Ad::paginate(3);

        if (count($ads) > 0) {

            if ($ads->total() > $ads->perPage()) {
                $data = [
                    'records' => AdResource::collection($ads),
                    'pagination' => [
                        'current_page' => url($ads->currentPage()),
                        'first_page' => $ads->url($ads->firstItem()),
                        'last_page' => $ads->url($ads->lastPage()),
                        'total' => $ads->total(),
                    ]
                ];
                if ($ads->hasMorePages()) {
                    $data['pagination']['next_page'] = $ads->nextPageUrl();
                }

                if ($ads->previousPageUrl()) {
                    $data['pagination']['previous_page'] = $ads->previousPageUrl();
                }
            } else {
                $data = AdResource::collection($ads);
            }

            return ApiResponse::success(200, 'Success to get ads', $data);
        }
        return ApiResponse::error(200, 'fialed to get ads', []);
    }

    public function storeAd(Adrequest $request)
    {
        //$data = $request->validated();
        //$data['user_id'] = $request->user()->id;
        //$ad = Ad::create($data);

        $ad = $request->validated();
        $ad = Ad::create([
            'title' => $request->title,
            'text' => $request->text,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id,
            'group_id' => $request->group_id,
            'slug' => 'slug',
            'status' => 'status',
        ]);

        return $ad;
    }

    public function show()
    {
        $ads = Ad::where('user_id', auth()->user()->id)->paginate(1);

        if (count($ads) > 0) {

            if ($ads->total() > $ads->perPage()) {
                $data = [
                    'records' => AdResource::collection($ads),
                    'pagination' => [
                        'current_page' => url($ads->currentPage()),
                        'first_page' => $ads->url($ads->firstItem()),
                        'last_page' => $ads->url($ads->lastPage()),
                        'total' => $ads->total(),
                    ]
                ];
                if ($ads->hasMorePages()) {
                    $data['pagination']['next_page'] = $ads->nextPageUrl();
                }

                if ($ads->previousPageUrl()) {
                    $data['pagination']['previous_page'] = $ads->previousPageUrl();
                }
            } else {
                $data = AdResource::collection($ads);
            }

            return ApiResponse::success(200, 'Success to get ads', $data);
        }
        return ApiResponse::error(200, 'fialed to get ads', []);
    }

    // public function updateAd($request, $adId): mixed
    // {

    //     $ad = Ad::findOrFail($adId);
    //     if ($ad->user_id != auth()->user()->id)  return ApiResponse::error(403, 'You are not allwoed to do this action', []);

    //     $data = $request->validated();
    //     $updatedAd = $ad->update($data);

    //     if ($updatedAd) return ApiResponse::success(201, 'Updated successfully',new AdResource($ad));
   // }

    public function destroyAd($adId)
    {

        $ad = Ad::findOrFail($adId);
        if ($ad->user_id != auth()->user()->id)  return ApiResponse::error(403, 'You are not allwoed to do this action', []);

        $deletRecord = $ad->delete();

        return $deletRecord;
    }
}