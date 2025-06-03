<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //  علقناه وبدلناه باللي تحتو
    public function handle(Request $request, Closure $next, string ...$guards): Response
    // public function handle($request, Closure $next)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (auth('tourist')->check()) {
            return redirect(RouteServiceProvider::tourist);
        }

        if (auth('owner')->check()) {
            return redirect(RouteServiceProvider::OWNER);
        }


        return $next($request);
    }
}
