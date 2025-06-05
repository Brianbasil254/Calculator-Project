<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AuthController;

Route::post('/calculator', [CalculatorController::class, 'calculate']);
Route::get('/calculation/{id}', [CalculatorController::class, 'show']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
// Route::get('/calculations', [CalculatorController::class, 'index']);