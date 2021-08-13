<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
              return $next($request);
        }
        if (Auth::user() &&  Auth::user()->role == 'admin') {
              return redirect()->route('admin');
        }

        return redirect('/')->with('error','Vous notes pas un admin');
    }
}

