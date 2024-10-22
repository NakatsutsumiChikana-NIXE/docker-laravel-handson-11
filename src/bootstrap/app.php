<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix: '', // これを記載することによってapi.phpに記載したrouteのリンクが、/api/がなくても動作させることができます
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ここでミドルウェアを登録します
        // $middleware->push(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class);
        // $middleware->push('throttle:api');
        // $middleware->push(\Illuminate\Routing\Middleware\SubstituteBindings::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
