<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Calculator API']);
});
Route::get('/health', function () {
    return response()->json(['status' => 'OK']);
});