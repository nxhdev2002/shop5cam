<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function checkSeller(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rights >= 3) {			
            return $next($request);
        }
        abort(404);
    }
}
