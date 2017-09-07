<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class EmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Sentinel::check()) {
            return redirect()->route('login');
        }

        if (!Sentinel::inRole('employer')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
