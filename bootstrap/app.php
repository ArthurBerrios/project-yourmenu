<?php

use App\Http\Middleware\CheckPerfilTypeAdmin;
use App\Http\Middleware\CheckPerfilTypeRestaurant;
use App\Http\Middleware\IdentifyRestaurant;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
                'perfil_restaurant' => CheckPerfilTypeRestaurant::class,
                'perfil_admin' => CheckPerfilTypeAdmin::class,
                'identify_restaurant' => IdentifyRestaurant::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
