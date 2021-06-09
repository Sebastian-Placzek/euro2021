<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        $response = $next($request);

        if (Auth::check() && Auth::user()->status != 'verified'){
            Auth::logout();
            session()->flash('error','Account in not verified, wait for verification by administrator');
            return redirect('/login');
        }
        return $response;
    }
}
