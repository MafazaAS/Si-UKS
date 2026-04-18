<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\Kunjungan_UKSController;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\Delivery_ObatController;
use App\Http\Controllers\AuthController;

Route::apiResource('users', UsersController::class);
Route::apiResource('pasien', PasienController::class);
Route::apiResource('kunjungan', Kunjungan_UKSController::class);
Route::apiResource('obat', ObatController::class);
Route::apiResource('delivery', Delivery_ObatController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// 🔓 PUBLIC (tanpa login)
Route::apiResource('delivery', Delivery_ObatController::class);

// 🔐 LOGIN
Route::post('/login', [AuthController::class,'login']);

// 🔒 HARUS LOGIN
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/register', [AuthController::class,'register']);
    Route::post('/logout', [AuthController::class,'logout']);

    // semua CRUD lain masuk sini kalau mau diamankan
    Route::apiResource('pasien', UsersController::class);
    Route::apiResource('kunjungan', ObatController::class);
    Route::apiResource('pasien', PasienController::class);
    Route::apiResource('kunjungan', Kunjungan_UKSController::class);
});
