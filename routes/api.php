<?php

use App\Http\Controllers\InterestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '1.0.0'], function () {
    Route::group(['prefix' => 'compound-interest'], function () {
        Route::get('/year', [InterestController::class, 'calculateByYear']);
        Route::get('/month', [InterestController::class, 'calculateByMonth']);
    });
});

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Welcome to the Interest Calculator API'
    ]);
});
