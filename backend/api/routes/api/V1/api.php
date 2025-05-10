<?php

use Illuminate\Support\Facades\Route;
use Backend\Models\Auth\AuthController;
use Backend\Models\PlanoAula\PlanoAulaController;
use Backend\Models\User\UserController;

Route::group([
    'prefix'     => 'v1',
], function (): void {

    Route::group([
        'namespace' => 'Auth'
    ], function (): void {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
        Route::post('cadastro', [UserController::class, 'cadastro'])->name('cadastro')->middleware('guest');
    });

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function (): void {
        Route::apiResource( 'plano-aula', PlanoAulaController::class );
    });
});
