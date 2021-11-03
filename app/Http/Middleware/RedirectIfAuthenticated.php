<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard==='admin'){
                return redirect()->route('admin.home');
            }
            if($guard==='doctor'){
                return redirect()->route('doctor.home');
            }
            return redirect()->route('user.home');
            //return redirect(RouteServiceProvider::HOME);
        }
        

        return $next($request);
    }
}
