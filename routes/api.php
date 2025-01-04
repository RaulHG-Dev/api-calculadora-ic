<?php

use App\Http\Controllers\InterestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/calculate-compount-interes', [InterestController::class, 'calculateCompoundInterest']);

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Welcome to the Interest Calculator API'
    ]);
});
