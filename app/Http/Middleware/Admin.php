<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (app('current_user'))
        {
            if (app('current_user')->is_admin != 1)
            {
                return redirect()->back()->with('fail', 'Access Denied! You are not Authorised');
            }

        }
        return $next($request);
    }
}
