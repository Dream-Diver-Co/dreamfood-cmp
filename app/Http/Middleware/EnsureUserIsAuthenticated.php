<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check()) {
    //         return $next($request);
    //     }

    //     return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart.');
    // }
    public function handle($request, Closure $next)
    {
        // Your logic here, for example:
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
