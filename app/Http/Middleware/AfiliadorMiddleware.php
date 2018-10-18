<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AfiliadorMiddleware
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
        if(Auth::user()->loggedAs == 'afiliador')
            return $next($request);
        return redirect()->route('home');
    }
}
