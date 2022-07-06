<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Category\Controllers\CategoryController;

Route::get('/', [CategoryController::class, 'index']);
Route::get('/{id}', [CategoryController::class, 'show']);
Route::post('/', [CategoryController::class, 'store']);
Route::patch('/{id}', [CategoryController::class, 'update']);
Route::delete('/{id}', [CategoryController::class, 'destroy']);