<?php

namespace App\Services\AdminServices;

use App\Models\District;

class DistrictIdService
{

    public function  getAllDistricts()
    {

        $districts = District::paginate(15);
        return view('Dashboard.District.districts', compact('districts'));
    }

    public function createDistrictPage()
    {
        return view("Dashboard.District.AddDistrict");
    }

    public function storeDistrict($request)
    {

        $data = $request->validated();
        $district =  District::create($data);
        if ($district) return  redirect()->route('districts');
    }

    public function editDistrictPage($districtId)
    {
        $district =  District::findOrFail($districtId);
        return view("Dashboard.District.EditDistrict", compact('district'));
    }

    public function updateDistrict($request, $districtId)
    {
        $data = $request->validated();
        $district = District::where('id', '=', $districtId)->first();
        $district->update($data);

        if ($district) return redirect()->route('districts', ['districtId' => $districtId]);
    }

    public function deleteDistrict($districtId)
    {
        $district = District::where('id', '=', $districtId)->first();
        $district->delete();

        if ($district) return redirect()->route('districts');
    }
}