<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AdTrackingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// tracking add
Route::post('/ads/{ad}/view', [AdTrackingController::class, 'trackView']);
Route::post('/ads/{ad}/click', [AdTrackingController::class, 'trackClick']);