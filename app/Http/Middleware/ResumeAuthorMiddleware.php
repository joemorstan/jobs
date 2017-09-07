<?php

namespace App\Http\Middleware;

use App\Resume;
use App\User;
use Sentinel;
use Closure;

class ResumeAuthorMiddleware
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
        if (Sentinel::getUser()->getUserId() != Resume::find($request->id)->user_id) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
