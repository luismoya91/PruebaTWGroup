<?php

use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/room', [RoomController::class, 'createRoom'])->name('room');
Route::get('/room/edit/{room}', [RoomController::class, 'editRoom'])->name('roomEdit');
Route::post('/room/edit/save/{room}', [RoomController::class, 'updateRoom'])->name('roomUpdate');
Route::get('/room/delete/{room}', [RoomController::class, 'destroyRoom'])->name('roomDelete');
Route::post('/reserve', [ReserveController::class, 'createReserve'])->name('reserve');
Route::get('/reserve/approve/{reserve}', [ReserveController::class, 'approveReserve'])->name('approveReserve');
Route::get('/reserve/cancel/{reserve}', [ReserveController::class, 'cancelReserve'])->name('cancelReserve');
Route::get('/reserve/search', [ReserveController::class, 'reserveSearch'])->name('reserveSearch');
