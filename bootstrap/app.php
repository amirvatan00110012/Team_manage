<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
           then: function ($router) {
            Route::prefix('/api')->middleware([])->group(base_path('routes/api.php'));
           },
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
        'api/*',        // Exclude all API routes
        // You can add other URIs here as needed
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
