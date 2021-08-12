<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Facade\FlareClient\Http\Response;

class MustBeAdministrator
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
        if(!Auth::check()||auth()->user()->name!='admin'){
            abort(403);
        }
        return $next($request);
    }
}
