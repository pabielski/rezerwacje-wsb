<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
Route::get('/',[HomeController::class,"index"]);
Route::get('/hotels',[HotelsController::class,"index"]);
Route::get('/razdwa', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
