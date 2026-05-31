<?php

use Illuminate\Support\Facades\Route;

Route::get('/razdwa', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
