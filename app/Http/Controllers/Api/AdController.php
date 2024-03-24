<?php

namespace App\Http\Controllers\Api;

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

    public function index()
    {
        $ads = Ad::paginate(1);

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

    public function store(Adrequest $request)
    {
        //$data = $request->validated();
        //$data['user_id'] = $request->user()->id;
        //$ad = Ad::create($data);

        $ad = $request->validated();
        $ad = Ad::create([
            'title' => $request->title,
            'text' => $request->text,
            'phone' => $request->phone,
            'user_id' => $request->user()->id,
            'group_id' => $request->group_id,
            'slug' => 'slug',
            'status' => 'status',
        ]);

        if ($ad) return ApiResponse::success(201, 'Ad created', new AdResource($ad));
    }

    public function show(Request $request)
    {
        $ads = Ad::where('user_id', $request->user()->id)->paginate(1);

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

    public function update(Adrequest $request, $adId)
    {
        $ad = Ad::findOrFail($adId);
        if ($ad->user_id != auth()->user()->id)  return ApiResponse::error(403, 'You are not allwoed to do this action', []);

        $data = $request->validated();

        $updatedRecord = $ad->update($data);

        if ($updatedRecord) return  ApiResponse::success(201, 'Updated Successfully', new AdResource($ad));
    }


    public function destroy(Request $request, $adId)
    {
        $ad = Ad::findOrFail($adId);
        if ($ad->user_id != auth()->user()->id)  return ApiResponse::error(403, 'You are not allwoed to do this action', []);


        $deletRecord = $ad->delete();

        if ($deletRecord) return  ApiResponse::success(200, 'Deleted Successfully', []);
    }
}