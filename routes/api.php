<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\CashController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(1);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', MeController::class);

    Route::prefix('cash')->group(function () {
        Route::post('create', [CashController::class, 'store']);
    });
});
