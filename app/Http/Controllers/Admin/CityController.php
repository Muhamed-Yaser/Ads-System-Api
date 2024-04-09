<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminServices\CityService;
use App\Http\Requests\AdminRequests\EditCityRequest;
use App\Http\Requests\AdminRequests\StoreCityRequest;

class CityController extends Controller
{
    protected  $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index()
    {
        return $this->cityService->getAllCities();
    }


    public function create()
    {
        return $this->cityService->createCityPage();
    }


    public function store(StoreCityRequest $request)
    {
        return $this->cityService->storeCity($request);
    }


    public function edit(string $cityId)
    {
        return $this->cityService->editCityPage($cityId);
    }


    public function update(EditCityRequest $request, int $cityId)
    {
        return $this->cityService->updateCity($request , $cityId);
    }


    public function destroy(int $cityId)
    {
        return $this->cityService->deleteCity($cityId);
    }
}