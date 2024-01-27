<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->user_type == 'admin') {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            } else if (Auth::guard($guard)->check() && Auth::user()->user_type == 'subadmin') {
                dd('here');
                return redirect(RouteServiceProvider::SUBADMIN_HOME);
            } else if (Auth::guard($guard)->check() && Auth::user()->user_type == 'incharge') {
                return redirect(RouteServiceProvider::INCHARGE_HOME);
            } else if (Auth::guard($guard)->check() && Auth::user()->user_type == 'client') {
                return redirect(RouteServiceProvider::HOME);
            }
        }


        return $next($request);
    }
}
