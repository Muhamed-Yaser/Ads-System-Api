<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminServices\districtIdService;
use App\Http\Requests\AdminRequests\EditDistrictRequest;
use App\Http\Requests\AdminRequests\StoreDistrictRequest;

class DistrictController extends Controller
{
    protected  $districtIdService;

    public function __construct(DistrictIdService $districtIdService)
    {
        $this->districtIdService = $districtIdService;
    }

    public function index()
    {
        return $this->districtIdService->getAllDistricts();
    }


    public function create()
    {
        return $this->districtIdService->createDistrictPage();
    }


    public function store(StoreDistrictRequest $request)
    {
        return $this->districtIdService->storeDistrict($request);
    }


    public function edit(string $districtId)
    {
        return $this->districtIdService->editDistrictPage($districtId);
    }


    public function update(EditDistrictRequest $request, int $districtId)
    {
        return $this->districtIdService->updateDistrict($request, $districtId);
    }


    public function destroy(int $districtId)
    {
        return $this->districtIdService->deleteDistrict($districtId);
    }
}
