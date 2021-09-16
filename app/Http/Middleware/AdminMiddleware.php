<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'participant') {
            return redirect()->route('/accueil');
        }

        if (Auth::user()->role == 'admin') {
            return $next($request);
        }

        if (Auth::user()->role == 'organisateur') {
            return redirect()->route('/accueil');
        }
        
        if(Gate::allows("admin"))
        {
            return $next($request);
        }
        return redirect()->route("home");

    }
}
