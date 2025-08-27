<?php

declare(strict_types=1);

use App\Exceptions\Handler;
use App\Http\Middleware\ForceJsonResponse;
use App\Http\Middleware\Localization;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (): void {
            Route::middleware('api')
                ->prefix('api/v1/admin')
                ->name('admin.')
                ->group(base_path('routes/API/v1/admin.php'));

            Route::middleware('api')
                ->prefix('api/v1/auth')
                ->name('auth.')
                ->group(base_path('routes/API/v1/auth.php'));

            Route::middleware('api')
                ->prefix('api/v1/customer')
                ->name('customer.')
                ->group(base_path('routes/API/v1/user.php'));

        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(ForceJsonResponse::class);
        $middleware->append(Localization::class);
    })->create();

$app->singleton(
    abstract: ExceptionHandler::class,
    concrete: Handler::class
);

return $app;
