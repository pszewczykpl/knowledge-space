<?php

namespace App\Http\Middleware;

use Closure;

class Permissions
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->hasPermission($permission)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
