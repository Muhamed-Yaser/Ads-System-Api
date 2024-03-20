<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

//Categories
Route::get('/categories', CategoryController::class);

 Route::controller(AdController::class)->prefix( 'ads' )->group(function () {
    //Get All Ads
    Route::get("/allAds", 'index');
 });