<?php

use App\Http\Middleware\DoctorScopeMiddleware;
use App\Http\Middleware\EnsureJsonAcceptHeader;
use App\Scopes\DoctorScope;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            EnsureJsonAcceptHeader::class, // Add to API group
            DoctorScopeMiddleware::class
        ]);
        $middleware->alias([
            'telescope.basic' => \App\Http\Middleware\TelescopeBasicAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $modelErrorMessages = [
            'App\Models\Patient' => 'Patient not found.',
            'App\Models\Provider' => 'Provider not found.', // Example: Doctor is a Provider
            'App\Models\Appointment' => 'Appointment not found.',
        ];

        $exceptions->render(function (ModelNotFoundException $exception) use ($modelErrorMessages) {
            $modelName = $exception->getModel();
            $errorMessage = $modelErrorMessages[$modelName] ?? 'Resource not found.'; // Default message
            return response()->json(['error' => $errorMessage], 404);
        });

        $exceptions->render(function (NotFoundHttpException $exception) use ($modelErrorMessages) {
            $previous = $exception->getPrevious();
            if ($previous instanceof ModelNotFoundException) {
                $modelName = $previous->getModel();
                $errorMessage = $modelErrorMessages[$modelName] ?? 'Resource not found.';
                return response()->json(['error' => $errorMessage], 404);
            }
            return response()->json(['error' => 'Route not found'], 404);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $exception, Request $request) {
            $requestMethod = $request->getMethod();
            $route = $request->route();
            $routeName = $route ? $route->getName() : null;
            $errorMessage = "The {$requestMethod} method is not allowed for this route.";
            
            if($routeName){
                $errorMessage = "The {$requestMethod} method is not allowed for route {$routeName}.";
            }
            return response()->json(['error' =>$errorMessage], 405);
        });

        $exceptions->render(function (AuthorizationException $exception) {
            return response()->json(['error' => 'This action is unauthorized'], 403);
        });

        $exceptions->render(function (AccessDeniedHttpException $exception) {
            return response()->json(['error' => "This action is unauthorized"], 403);
        });

        $exceptions->render(function (QueryException $exception) {
            return response()->json(['error' => "An error occurred while retrieving data. Please try again later."], 500);
        });

        $exceptions->render(function (AuthenticationException $exception) {
            return response()->json(['error' => "You have to login first"], 401);
        });
    })->create();
