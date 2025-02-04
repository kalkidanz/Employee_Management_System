<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
