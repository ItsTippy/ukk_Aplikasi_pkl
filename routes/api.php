<?php

use App\Http\Controllers\APIGuruController;
use App\Http\Controllers\APIIndustriController;
use App\Http\Controllers\APIPklController;
use App\Http\Controllers\APISiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('guru', APIGuruController::class);
Route::apiResource('siswa', APISiswaController::class);
Route::apiResource('industri', APIIndustriController::class);
Route::apiResource('pkls', APIPklController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
