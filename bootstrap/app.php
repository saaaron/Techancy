<?php

use App\Http\Middleware\CheckEmailVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(replace: [
            Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class =>
            App\Http\Middleware\CheckCsrf::class
        ]);

        // Register CheckEmailVerify middleware
        $middleware->alias([
            'emailVerified' => CheckEmailVerified::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
