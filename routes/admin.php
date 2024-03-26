<?php
use Illuminate\Support\Facades\Route;





//fallback
Route::fallback(function(){
    return 'page not found';
});
