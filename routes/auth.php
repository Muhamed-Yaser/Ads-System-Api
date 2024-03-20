<?php

use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Support\Facades\Route;




//User
Route::controller(UserController::class)->prefix('auth/user')->group(function () {

    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});