<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
Route::get('/',[HomeController::class,"index"]);
Route::get('/hotels', [HotelsController::class, 'index']);
Route::get('/hotels/edit/{id}',[HotelsController::class,"editView"]);
Route::post('/hotels/update/{id}',[HotelsController::class,"update"]);
Route::get('/hotels/create', [HotelsController::class, 'createView']);
Route::post('/hotels/add-to-database', [HotelsController::class, 'addToDatabase']);
