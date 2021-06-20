<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        } else if (Auth::user())  return redirect()->route('dashboard')->with('access_denied', 'Access denied. Only Admin is authorized to access.');
        else return redirect()->route('login')->with('access_denied', 'Access denied. Only Admin is authorized to access.');
    }
}
