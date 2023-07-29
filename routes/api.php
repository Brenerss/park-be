<?php

use App\Http\Controllers\Api\ParkingsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
   Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('users')->group(function () {
   Route::post('/', [UsersController::class, 'store']);
});

Route::prefix('parkings')->group(function () {
    Route::post('/', [ParkingsController::class, 'store']);
    Route::post('/{parking}', [ParkingsController::class, 'update']);
});
