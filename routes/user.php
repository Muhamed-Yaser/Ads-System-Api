<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\AdController;
use App\Http\Controllers\Api\User\CityController;
use App\Http\Controllers\Api\User\GroupController;
use App\Http\Controllers\Api\User\AdViewController;
use App\Http\Controllers\Api\User\MessageController;
use App\Http\Controllers\Api\User\SettingController;
use App\Http\Controllers\Api\User\DistrictController;
use App\Http\Controllers\Api\Auth\UserController;
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

//authUser
Route::controller(UserController::class)->prefix('auth/user')->group(function () {

    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

//CRUD ads
Route::controller(AdController::class)->middleware(["auth:sanctum"])->prefix('ads')->group(function (){

    Route::get("/allAds", 'index')->withoutMiddleware(["auth:sanctum"]);
    Route::post("/storeAd", 'store');
    Route::get("/showAd", 'show');
    Route::post("/updateAd/{adId}", 'update');
    Route::get("/deleteAd/{adId}", 'destroy');
});

//Oprations on ads
Route::controller(AdViewController::class)->prefix('ads')->group(function () {

    Route::get("/latestAds", 'latest');
    Route::get("/group/{group_id}", 'group');
    Route::get("/search", 'search');
});

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

//fallback
Route::fallback(function(){
    return 'page not found';
});
