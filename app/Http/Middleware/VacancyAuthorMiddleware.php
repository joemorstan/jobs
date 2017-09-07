<?php

namespace App\Http\Middleware;

use Sentinel;
use App\Vacancy;
use Closure;

class VacancyAuthorMiddleware
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
        if (Sentinel::getUser()->getUserId() != Vacancy::find($request->id)->user_id) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
