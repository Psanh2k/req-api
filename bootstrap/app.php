<?php

use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth'             => AuthenticateMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => $exception->errors(),
                ], $exception->status);
            }


            return parent::render($request, $exception);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => 'The HTTP method is not allowed for this route.',
                ], Response::HTTP_METHOD_NOT_ALLOWED);
            }
    
            return parent::render($request, $exception);
        });

        $exceptions->render(function (AuthenticationException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthenticated',
                ], Response::HTTP_METHOD_NOT_ALLOWED);
            }
    
            return parent::render($request, $exception);
        });

        $exceptions->render(function (HttpException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => $exception->getMessage(),
                ], $exception->getStatusCode());
            }
    
            return parent::render($request, $exception);
        });
    })->create();
