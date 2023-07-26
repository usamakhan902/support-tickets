<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Closure;



class EnsureBearerToken
{
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (AuthenticationException $exception) {
            return new JsonResponse(['error' => 'Unauthenticated.'], 401);
        }
    }
}
