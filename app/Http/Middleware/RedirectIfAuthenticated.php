<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use AWS\CRT\Log;
use Closure;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {


            if ($guard == "admin" && Auth::guard($guard)->check()) {

                return redirect('/admin/dashboard');

            }

            if (Auth::guard($guard)->check()) {
                return redirect('/student/dashboard');
            }


        }

        return $next($request);
    }
}
