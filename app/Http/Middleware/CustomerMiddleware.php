<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
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
//        dd(auth()->user()->role = "2");
        if (Auth::guest()) {
            return redirect('/signin')->with('warning', 'You have not login');
        } elseif (auth()->user()->role == 1 or auth()->user()->role == 2) {
            return $next($request);
        } else {
            return redirect('/')->with('warning', 'You have not admin access');
        }
    }
}
