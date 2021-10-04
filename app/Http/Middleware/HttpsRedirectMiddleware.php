<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsRedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->secure() && !isDev()) {
            return redirect()->secure($request->fullUrl());
        }

        return $next($request);
    }
}
