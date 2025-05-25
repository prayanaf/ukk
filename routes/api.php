<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\IndustriController;
use App\Http\Controllers\Api\PklController;
use App\Http\Controllers\Api\GuruController;

Route::apiResource('guru', GuruController::class);
Route::apiResource('siswa', SiswaController::class);
Route::apiResource('industris', IndustriController::class);
Route::apiResource('pkl', PklController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
