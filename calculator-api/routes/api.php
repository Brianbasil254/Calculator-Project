<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;


Route::post('/calculator', [CalculatorController::class, 'calculate']);
Route::get('/calculation/{id}', [CalculatorController::class, 'show']);
