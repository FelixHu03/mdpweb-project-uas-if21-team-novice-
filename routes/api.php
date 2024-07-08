<?php

use App\Http\Controllers\API\TamuController;
use App\Models\Tamu;
use Illuminate\Routing\Route;

Route::get('tamus', [TamuController::class, 'index']);
Route::post('tamus', [TamuController::class, 'store']);
Route::patch('tamus/{id}', [TamuController::class, 'update']);
Route::delete('fakultas/{id}', [TamuController::class, 'destroy']);