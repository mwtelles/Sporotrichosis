<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAndUser
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
        if(auth()->user()->type != 1 and auth()->user()->type != 0){
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
