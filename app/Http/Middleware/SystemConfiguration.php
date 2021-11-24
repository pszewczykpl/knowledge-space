<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class SystemConfiguration
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
        if(Auth::check())
            $dark_mode = Auth::user()->v_dark_mode;
        else
            $dark_mode = session('dark_mode', config('view.default_dark_mode'));
        View::share('dark_mode', $dark_mode);

        return $next($request);
    }
}
