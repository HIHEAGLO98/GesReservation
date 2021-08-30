<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrganisateurMiddleware
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
        /*
        if(Gate::allows("organisateur"))
        {
            return $next($request);
        }
        */
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.');
        }

        if (Auth::user()->role == 'organisateur') {
            return $next($request);
        }

        if (Auth::user()->role == 'participant') {
            return redirect()->route('participant.');
        }
        
        if(Gate::allows("organisateur"))
        {
            return $next($request);
        }

        return redirect()->route("home");

    }
}
