<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Backend\Base\Exceptions\BackendException;
use Backend\Base\Middleware\AuthenticateSaas;
use Backend\Base\Middleware\AuthenticateRegisterWebhook;
use Backend\Base\Middleware\AuthenticateUser;
use Backend\Base\Middleware\EnsureUserIsVerified;
use Backend\Commands\UpdatePositionQueries;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: [
            __DIR__.'/../routes/api/V1/api.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->dontReport([
            BackendException::class
        ]);

    })
    ->create();
