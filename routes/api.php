<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\Kunjungan_UKSController;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\Delivery_ObatController;
use App\Http\Controllers\AuthController;


// Public Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('delivery', [Delivery_ObatController::class, 'store']);
Route::get('/test', function () {
    return response()->json([
        'message' => 'Laravel aktif'
    ], 555);
});

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [AuthController::class, 'register'])
    ->middleware('auth:sanctum');
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('user', UserController::class);
    Route::apiResource('obat', ObatController::class);
    Route::apiResource('pasien', PasienController::class);
    Route::apiResource('kunjungan', Kunjungan_UKSController::class);

    Route::get('delivery', [Delivery_ObatController::class, 'index']);
    Route::get('delivery/{delivery}', [Delivery_ObatController::class, 'show']);
    Route::put('delivery/{delivery}', [Delivery_ObatController::class, 'update']);
    Route::delete('delivery/{delivery}', [Delivery_ObatController::class, 'destroy']);

});
