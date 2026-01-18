<?php

namespace App\Http\Middleware;

use Closure;

class Stockist
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
        if (auth()->user() && auth()->user()->package_id < 5)
        {
            abort(401);
        }
        return $next($request);
    }
}
