<?php

namespace App\Http\Middleware;

use App\Traits\JsonResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    use JsonResponse;

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $userRoles = explode(',', $request->user()->roles);

        $found = array_intersect($roles, $userRoles);

        if (count($found) === 0) {
            return $this->jsonResponse(403, 'Not allowed to visit this route!!!');
        }

        return $next($request);
    }
}
