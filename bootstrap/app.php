<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $e, $request) {
            $statusCode = $e->getStatusCode();
            switch ($statusCode) {
                case 404:
                    return response()->json([
                        'code' => 404,
                        'status' => false,
                        'message' => 'Record not found.',
                        'data' => [],
                        'errors' => []
                    ], 404);

                case 500:
                    return response()->json([
                        'code' => 500,
                        'status' => false,
                        'message' => 'Internal server error.',
                        'data' => [],
                        'errors' => []
                    ], 500);

                case 405:
                    return response()->json([
                        'code' => 405,
                        'status' => false,
                        'message' => 'Method not allowed.',
                        'data' => [],
                        'errors' => []
                    ], 405);

                default:
                    return response()->json([
                        'code' => $statusCode,
                        'status' => false,
                        'message' => $e->getMessage() ?: 'An error occurred.',
                        'data' => [],
                        'errors' => []
                    ], $statusCode);
            }
        });
    })->create();
