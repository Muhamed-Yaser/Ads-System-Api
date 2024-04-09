<?php

namespace App\Services\AdminServices;

use App\Models\City;

class CityService
{

    public function  getAllCities()
    {

        $cities = City::paginate(15);
        return view('Dashboard.City.cities', compact('cities'));
    }

    public function createCityPage()
    {

        return view("Dashboard.City.AddCity");
    }

    public function storeCity($request)
    {

        $data = $request->validated();
        $city =  City::create($data);
        if ($city) return  redirect()->route('cities');
    }

    public function editCityPage($cityId)
    {
        $city =  City::findOrFail($cityId);
        return view("Dashboard.City.EditCity", compact('city'));
    }

    public function updateCity($request, $cityId)
    {
        $data = $request->validated();
        $city = City::where('id', '=', $cityId)->first();
        $city->update($data);

        if ($city) return redirect()->route('cities', ['cityId' => $cityId]);
    }

    public function deleteCity($cityId)
    {
        $city = City::where('id', '=', $cityId)->first();
        $city->delete();

        if ($city) return redirect()->route('cities');
    }
}