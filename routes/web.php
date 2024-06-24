<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\LayananTambahanController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TamuController;
use App\Models\kamar;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/pembuat', function () {
    return view('pembuat');
});

// Middleware group for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('hotel', HotelController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('layanan_tambahan', LayananTambahanController::class);
    Route::resource('kamar', KamarController::class);
    Route::resource('tamu', TamuController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';