<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Ad;
use App\Services\AdService;
use App\Traits\ApiResponseTrait;
use Spatie\FlareClient\Api;
use Illuminate\Http\Request;
use App\Http\Requests\Adrequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AdResource;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class AdController extends Controller
{
    use ApiResponseTrait;

    protected static $adResourceclass = AdResource::class;

    public function __construct(protected AdService $adService)
    {
    }

    public function index(): mixed
    {
        $ads = $this->adService->index();

        return self::$adResourceclass::collection($ads);
    }

    public function store(Adrequest $request)
    {
        $this->adService->storeAd($request);
        return $this->success([],__('site.Ad Added successfully'),200);
    }

    public function show(): mixed
    {
        $ads= $this->adService->show();

        return self::$adResourceclass::collection($ads);

    }

    public function update(Adrequest $request, $adId): JsonResponse
    {
        return $this->adService->updateAd($request, $adId) ?? null;
      

    }

    public function destroy($adId) :mixed
    {
        $adIdExists = DB::table('ads')->where('id', $adId)->exists();

        if (!$adIdExists) {

            return $this->error( __('site.Ad not found'),404);
        }

        $deletRecord = $this->adService->destroyAd($adId);

        return $this->success([],__('site.Ad Deleted successfully'),200);
    }
}
