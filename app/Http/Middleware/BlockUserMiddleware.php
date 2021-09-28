<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockUserMiddleware
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
        if(auth()->user()->block == true){
            abort(401);
            return redirect()->route('login');
        }

        return $next($request);
    }
}
