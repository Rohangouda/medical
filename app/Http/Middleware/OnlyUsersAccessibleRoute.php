<?php

namespace App\Http\Middleware;

use Closure;

class OnlyUsersAccessibleRoute
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
        if ($userRole == 'user'){
            return $next($request);
        }
        return redirect()->back();
    }
}
