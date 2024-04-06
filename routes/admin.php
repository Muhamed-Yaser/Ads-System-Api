<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AdController;
use App\Http\Controllers\Api\User\CityController;
use App\Http\Controllers\Api\User\GroupController;
use App\Http\Controllers\Api\User\AdViewController;
use App\Http\Controllers\Api\User\MessageController;
use App\Http\Controllers\Api\User\SettingController;
use App\Http\Controllers\Api\User\DistrictController;
use App\Http\Controllers\Api\Auth\AdminController;
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

//authAdmin
Route::controller(AdminController::class)->prefix('admin')->group(function () {

    //Route::middleware('isAdmin')->group(function(){

    Route::get('login', 'loginPage')->name('loginPage');
    Route::post('login', 'login')->name('login');


    Route::get('/profile', 'profile')->name('Dashboard.profile');
    Route::get('/editProfile', 'editProfile')->name('Dashboard.editProfile');
    Route::post('/updateProfile', 'updateProfile')->name('updateProfile');

    Route::post('/logout', 'logout');
    //});
});

//ads
Route::controller(AdController::class)->group(function () {

    Route::get("/index", 'index')->name('Dashboard.index');
    Route::get("/deleteAd/{adId}", 'destroy')->name('destroy');
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
Route::fallback(function () {
    return 'page not found';
});