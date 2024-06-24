<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/login/index');
});
Route::get('tes', function(){
    return view('tes');
});

Route::resource('hotel', HotelController::class);
// pegawai
Route::resource('pegawai', PegawaiController::class);
// untuk login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/login', [LoginController::class, 'login']);
// untuk logout
Route::get('/login/logout', [LoginController::class, 'logout']);
// untuk Register
Route::get('/login/register', [LoginController::class, 'register']);
Route::post('/login/create', [LoginController::class, 'create']);
