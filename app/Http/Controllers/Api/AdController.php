<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function index()
    {
        $ads = Ad::latest()->paginate(3);

        if( count( $ads ) > 0) return ApiResponse::success(200 , 'Success to get ads' , $ads );
        else return ApiResponse::error(200 , 'fialed to get ads' , [] );
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}