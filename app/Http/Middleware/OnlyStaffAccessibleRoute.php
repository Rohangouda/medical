<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;

class OnlyStaffAccessibleRoute
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
        if ($userRole == 'Staff'){
            return $next($request);
        }
        return redirect()->back();
    }
}
