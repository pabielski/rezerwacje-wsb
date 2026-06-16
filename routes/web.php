<?php

use App\Http\Controllers\AmenityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

Route::get('/',[HomeController::class,"index"]);

Route::get('/hotels', [HotelsController::class, 'index'])->middleware('admin');
Route::get('/hotels/edit/{id}',[HotelsController::class,"editView"])->middleware('admin');
Route::post('/hotels/update/{id}',[HotelsController::class,"update"])->middleware('admin');
Route::get('/hotels/create', [HotelsController::class, 'createView'])->middleware('admin');
Route::post('/hotels/add-to-database', [HotelsController::class, 'addToDatabase'])->middleware('admin') ;
Route::delete('/hotels/delete/{id}', [HotelsController::class, 'delete'])->middleware('admin');

Route::get('/amenities', [AmenityController::class, 'index'])->middleware('admin');
Route::get('/amenities/edit/{id}',[AmenityController::class,"getAmenityView"])->middleware('admin');
Route::get('/amenities/create', [AmenityController::class, 'getCreateView'])->middleware('admin');
Route::post('/amenities/add-to-database', [AmenityController::class, 'create'])->middleware('admin')    ;
Route::post('/amenities/update/{id}',[AmenityController::class,"update"])->middleware('admin');
Route::delete('/amenities/delete/{id}',[AmenityController::class,"delete"])->middleware('admin');

Route::get('/rooms', [RoomController::class, 'index'])->middleware('admin');
Route::get('/rooms/edit/{id}',[RoomController::class,"editView"])->middleware('admin');
Route::get('/rooms/create', [RoomController::class, 'createView'])->middleware('admin');
Route::post('/rooms/add-to-database', [RoomController::class, 'addToDatabase'])->middleware('admin');
Route::post('/rooms/update/{id}',[RoomController::class,"updateRoom"])->middleware('admin');
Route::get('/rooms/add-amenity/{id}',[RoomController::class, 'addAmenity'])->middleware('admin');
Route::post('/rooms/add-amenity/{id}',[RoomController::class, 'addAmenityToDatabase'])->middleware('admin');
Route::delete('/rooms/delete/{id}', [RoomController::class, 'delete'])->middleware('admin');

Route::get('/reservations', [ReservationController::class, 'index'])->middleware('admin');
Route::get('/reservations/edit/{id}',[ReservationController::class,"editView"])->middleware('admin');
Route::get('/reservations/create', [ReservationController::class, 'createView'])->middleware('admin');
Route::post('/reservations/add-to-database', [ReservationController::class, 'addToDatabase'])->middleware('admin');
Route::post('/reservations/update/{id}',[ReservationController::class,"updateReservation"])->middleware('admin');
Route::post('/reservations/delete/{id}',[ReservationController::class,"deleteReservation"])->middleware('admin')    ;

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);