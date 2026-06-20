<?php

use App\Http\Middleware\EnsureUserHasRole;
use App\Support\JsonResponseHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\ErrorLog;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'hasRole' => EnsureUserHasRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e) {

            $json = new JsonResponseHandler;
            $message = $e->getMessage();
            // dd(get_class($e));

             // Log the exception
            Log::error($e->getMessage(), ['exception' => $e]);
            // table errors_logs
            ErrorLog::create([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'class' => get_class($e),
                'previous' => $e->getPrevious(),
                'trace' => $e->getTraceAsString(),
                 'method' => request()->method(),
                'url' => request()->url(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'user_id' => auth()->user()?->id,
                'user_name' => auth()->user()?->name,
                'user_email' => auth()->user()?->email,
            ]);


            // Exceptions
            if ($e instanceof AccessDeniedHttpException) {
                return $json->jsonResponse(403, $message);
            }

            if ($e instanceof ValidationException) {
                return $json->jsonResponse(422, $message, $e->errors());
            }

            if ($e instanceof AuthenticationException) {
                return $json->jsonResponse(401, $message);
            }

            if ($e instanceof NotFoundHttpException) {
                return $json->jsonResponse(404, $message);
            }

            if ($e instanceof MethodNotAllowedHttpException) {
                return $json->jsonResponse(405, $message);
            }

            if ($e instanceof BadRequestHttpException) {
                return $json->jsonResponse(400, $message);
            }

            if (app()->hasDebugModeEnabled()) {
                return $json->jsonResponse(500, $message, [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'class' => get_class($e),
                    'message' => $e->getMessage(),
                    'previous' => $e->getPrevious(),
                    'trace' => $e->getTraceAsString(),
                ]);
            }

            return $json->jsonResponse(500, 'Internal Server Error');
         });
    })->create();
