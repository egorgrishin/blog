<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Auth\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('check', [AuthController::class, 'check']);