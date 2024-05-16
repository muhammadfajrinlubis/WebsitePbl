<?php



use GuzzleHttp\Middleware;
use Illuminate\Foundation\Application;

// Ensure the base path is correctly pointed to the application's root directory
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function ( $middleware) {

    })
    ->withExceptions(function ($exceptions) {
     //
    })
    ->create();
