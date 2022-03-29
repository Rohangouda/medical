<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdminAccessibleRoute
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
        $userRole = session('user_role');
        if ($userRole == 'Admin'){
            return $next($request);
        }
        return redirect()->back();
    }
}
