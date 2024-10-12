<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/isPrime', [APIController::class, 'isPrime']);

Route::post('/isPalindrome', [APIController::class, 'isPalindrome']);

Route::post('/pascalTriangle', [APIController::class, 'pascalTriangle']);
