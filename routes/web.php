<?php

use App\Http\Controllers\AmenityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;

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

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/edit/{id}',[RoomController::class,"editView"]);
Route::get('/rooms/create', [RoomController::class, 'createView']);
Route::post('/rooms/add-to-database', [RoomController::class, 'addToDatabase']);
Route::post('/rooms/update/{id}',[RoomController::class,"updateRoom"]);
Route::get('/rooms/add-amenity/{id}',[RoomController::class, 'addAmenity']);
Route::post('/rooms/add-amenity/{id}',[RoomController::class, 'addAmenityToDatabase']);
// Route::delete('/rooms/delete/{id}',[RoomController::class,"delete"]);

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/edit/{id}',[ReservationController::class,"editView"]);
Route::get('/reservations/create', [ReservationController::class, 'createView']);
Route::post('/reservations/add-to-database', [ReservationController::class, 'addToDatabase']);
Route::post('/reservations/update/{id}',[ReservationController::class,"updateReservation"]);
