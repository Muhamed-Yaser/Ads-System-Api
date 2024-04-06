<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adrequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Services\UserServices\AdService;
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
        return $this->adService->storeAd($request);
    }

    public function show()
    {
        return $this->adService->show();
    }

    public function update(Adrequest $request, $adId)
    {
        return $this->adService->updateAd($request, $adId) ?? null;
    }

    public function destroy($adId)
    {
        return $this->adService->destroyAd($adId);
    }
}