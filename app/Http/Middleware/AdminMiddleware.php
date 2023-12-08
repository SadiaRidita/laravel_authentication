<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user has the 'admin' role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect or respond with an error if the user doesn't have the required role
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
