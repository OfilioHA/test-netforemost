<?php

use App\Http\Controllers\AccommodationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('acccommodations')->group(function () {
    Route::get('/', [AccommodationController::class, 'index']);
    Route::get('/report', [AccommodationController::class, 'report']);
});