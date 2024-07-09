<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();

            if ($user->role == 'admin') {
                return redirect()->intended(route('admin'));
            } elseif ($user->role == 'plastic user') {
                return redirect()->intended(route('dashboard'));
            } elseif ($user->role == 'recycling organization') {
                return redirect()->intended(route('landingRecycler'));
            } else {
                return redirect()->intended(route('/'));
            }
        }

        return $next($request);
    }
}
