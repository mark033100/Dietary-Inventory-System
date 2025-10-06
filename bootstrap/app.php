<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('auth')
                ->middleware('api')
                ->group(base_path('routes/auth.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // 🧩 1. Custom error logging
        $exceptions->report(function (Throwable $e) {
            Log::error('Exception occurred', [
                'error_title' => 'Server Error',
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_type' => get_class($e),
            ]);

            // Save detailed trace in the daily log
            Log::channel('daily')->error('❌ Exception Trace', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        });

        // 🧩 2. Handle validation exceptions (422)
        $exceptions->renderable(function (Throwable $e) {
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return response()->json([
                    'error_title' => 'Validation Error',
                    'error_message' => $e->getMessage(),
                    'error_code' => 422,
                    'error_type' => get_class($e),
                    'errors' => $e->errors(), // include validation field errors
                ], 422);
            }
            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                return response()->json([
                    'error_title' => 'Authentication Error',
                    'error_message' => $e->getMessage(),
                    'error_code' => 401,
                    'error_type' => get_class($e),
                ], 401);
            }

            // 🧩 3. Default fallback for all other exceptions (500)
            return response()->json([
                'error_title' => 'Server Error',
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode() ?: 500,
                'error_type' => get_class($e),
            ], 500);
        });

    })
    ->create();
