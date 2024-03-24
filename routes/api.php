<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\DistrictController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Settings
Route::get('/settings', SettingController::class);

//City
Route::get('/cities', CityController::class);

//District
Route::get('/districts', DistrictController::class);

//Message
Route::post('/message', MessageController::class);

//groups
Route::get('/groups', GroupController::class);

Route::controller(AdController::class)->prefix('ads')->group(function () {

    Route::get("/allAds", 'index');
    Route::get("/latestAds", 'latest');
    Route::get("/group/{group_id}", 'group');
    Route::get("/search", 'search');
});

Route::controller(AdController::class)->middleware(["auth:sanctum"])->prefix('ads')->group(function (){
    //create,show,update,delete ad
    Route::post("/storeAd", 'store');
    Route::get("/showAd", 'show');
    Route::post("/updateAd/{adId}", 'update');
    Route::get("/deleteAd/{adId}", 'destroy');
});