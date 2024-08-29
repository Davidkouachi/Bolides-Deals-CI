<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Contracts\Http\Kernel;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/');
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'statuthorsligne' => \App\Http\Middleware\StatutHorsLigneMiddleware::class,
            'CheckSessionMiddleware' => \App\Http\Middleware\CheckSessionMiddleware::class,
            'CheckPapierJourMiddleware' => \App\Http\Middleware\CheckPapierJourMiddleware::class,
        ]);
        $middleware->web([
            'statuthorsligne',
            'CheckSessionMiddleware',
            'CheckPapierJourMiddleware',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
