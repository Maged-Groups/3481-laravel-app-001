<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class Controller
{
    use JsonResponse;

    // Log everything in the request
    public function __construct(Request $request)
    {
        // Routes to log
        $routesToLog = [
            'api/auth/login',
            'api/auth/register',
            'api/auth/logout',
            'api/auth/refresh',
            'api/auth/me',
            'api/auth/forgot-password',
            'api/auth/reset-password',
        ];

        if (in_array($request->route()->getName(), $routesToLog)) {
            Log::info('Request: '.$request->fullUrl(), [
                'request' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'method' => $request->method(),
                'url' => $request->url(),
                'params' => $request->all(),
                'headers' => $request->headers->all(),
                'user_id' => $request->user()?->id,
                'user_name' => $request->user()?->name,
                'user_email' => $request->user()?->email]);
        }
    }
}
