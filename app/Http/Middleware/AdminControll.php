<?php

namespace App\Http\Middleware;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Closure;

class AdminControll
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

        if ( !Sentry::check())
        {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
