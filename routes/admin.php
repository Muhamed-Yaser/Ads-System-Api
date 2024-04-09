<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DistrictController;
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

    Route::get('login', 'loginPage')->name('loginPage');
    Route::post('login', 'login')->name('login');


    Route::get('/profile', 'profile')->name('profile');
    Route::get('/editProfile', 'editProfile')->name('editProfile');
    Route::post('/updateProfile', 'updateProfile')->name('updateProfile');

    Route::get('/logout', 'logout')->name('logout');
});

//ads
Route::controller(AdController::class)->group(function () {

    Route::get("/index", 'index')->name('Dashboard.index');
    Route::post("/destroy/{adId}", 'destroy')->name('destroy');
});

// //City
Route::controller(CityController::class)->group(function () {
    Route::get('cities', 'index')->name('cities');

    Route::get('addCityPage', 'create')->name('addCityPage');
    Route::post('storeCity', 'store')->name('storeCity');

    Route::get('EditCityPage/{cityId}', 'edit')->name('editCityPage');
    Route::post('updateCity/{cityId}', 'update')->name('updateCity');

    Route::post('deleteCity/{cityId}', 'destroy')->name('deleteCity');
});

// //District
Route::controller(DistrictController::class)->group(function () {
    Route::get('districts', 'index')->name('districts');

    Route::get('addDistrictPage', 'create')->name('addDistrictPage');
    Route::post('storeDistrict', 'store')->name('storeDistrict');

    Route::get('EditDistrictPage/{districtId}', 'edit')->name('editDistrictPage');
    Route::post('updateDistrict/{districtId}', 'update')->name('updateDistrict');

    Route::post('deleteDistrict/{districtId}', 'destroy')->name('deleteDistrict');
});

// //Group => المحافظة !!
Route::controller(GroupController::class)->group(function () {
    Route::get('groups', 'index')->name('groups');

    Route::get('addrGroupPage', 'create')->name('addGroupPage');
    Route::post('storeGroup', 'store')->name('storeGroup');

    Route::get('EditGroupPage/{groupId}', 'edit')->name('editGroupPage');
    Route::post('updateGroup/{groupId}', 'update')->name('updateGroup');

    Route::post('deleteGroup/{groupId}', 'destroy')->name('deleteGroup');
});

// //Message
Route::controller(MessageController::class)->group(function () {

    Route::get("/messages", 'index')->name('messages');
    Route::post("/destroyMessage/{messageId}", 'destroyMessage')->name('destroyMessage');
});

//Settings---About Us---
Route::controller(SettingController::class)->group(function () {
    Route::get('settings', 'index')->name('settings');

    Route::post('updatesettings/{settingId}', 'updateSettings')->name('updateAllSettings');
});

//fallback
Route::fallback(function () {
    return 'page not found';
});
