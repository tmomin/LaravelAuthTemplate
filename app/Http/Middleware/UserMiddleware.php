<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class UserMiddleware
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
        // 1. User should be authenticated
        // 2. Authenticated user should be an user

        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
            return $next($request);
        else
            return redirect('/');
    }
}
