<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        $userRole = auth()->user()->role;
        echo $userRole;
        if(!in_array($userRole,$roles)){
            abort(404,'oh shjt get back');
        }
        return $next($request);
    }
}
