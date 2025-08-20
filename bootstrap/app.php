<?php

use App\Http\Middleware\VerifyAccountStatus;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
    then: function () {
        Route::middleware(['web', 'auth', 'active'])->prefix('control-panel')->name('control-panel.')->group(function () {
            require base_path('routes/control-panel.php');
        });
        Route::middleware(['web', 'auth'])->group(base_path('routes/auth.php'));
        Route::middleware(['web', 'guest'])->group(base_path('routes/guest.php'));
    }
)->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'role' => RoleMiddleware::class,
        'permission' => PermissionMiddleware::class,
        'role_or_permission' => RoleOrPermissionMiddleware::class,
        'active' => VerifyAccountStatus::class,
    ]);
})->withExceptions(function (Exceptions $exceptions) {
    //
})->create();
