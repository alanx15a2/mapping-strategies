<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/no-mapping', [App\Strategies\NoMapping\AccountController::class, 'sendMoney']);
Route::get('/two-way-mapping', [App\Strategies\TwoWayMapping\AccountController::class, 'sendMoney']);
Route::get('/full-mapping', [App\Strategies\FullMapping\AccountController::class, 'sendMoney']);
Route::get('/one-way-mapping', [App\Strategies\OneWayMapping\AccountController::class, 'sendMoney']);
