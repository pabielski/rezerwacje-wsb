<?php

use App\Http\Controllers\AmenityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
Route::get('/',[HomeController::class,"index"]);
Route::get('/hotels', [HotelsController::class, 'index']);
Route::get('/hotels/edit/{id}',[HotelsController::class,"editView"]);
Route::post('/hotels/update/{id}',[HotelsController::class,"update"]);
Route::get('/hotels/create', [HotelsController::class, 'createView']);
Route::post('/hotels/add-to-database', [HotelsController::class, 'addToDatabase']);

Route::get('/amenities', [AmenityController::class, 'index']);
Route::get('/amenities/edit/{id}',[AmenityController::class,"getAmenityView"]);
Route::get('/amenities/create', [AmenityController::class, 'getCreateView']);
Route::post('/amenities/add-to-database', [AmenityController::class, 'create']);
Route::post('/amenities/update/{id}',[AmenityController::class,"update"]);
Route::delete('/amenities/delete/{id}',[AmenityController::class,"delete"]);
