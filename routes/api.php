<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
   Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('users')->group(function () {
   Route::post('/', [UserController::class, 'store']);
});

