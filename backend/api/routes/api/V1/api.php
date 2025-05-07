<?php

use Illuminate\Support\Facades\Route;
use Backend\Models\Auth\AuthController;

Route::group([
    'prefix'     => 'v1',
], function (): void {

    Route::group([
        'namespace' => 'Auth'
    ], function (): void {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('me', [AuthController::class, 'me'])->name('me')->middleware('auth:sanctum');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
    });

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function (): void {

    });
});
