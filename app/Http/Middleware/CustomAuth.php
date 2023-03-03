<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuth
{
    public function handle(Request $request, Closure $next)
    {
        return (!$this->isAuthenticated($request))
            ? failed('Unauthorized', 401)
            : $next($request);
    }

    public function isAuthenticated(Request $request): bool
    {
        return (!empty($request->header('api-key')) ||
            $request->header('api-key') != env('API_KEY'));
    }
}
