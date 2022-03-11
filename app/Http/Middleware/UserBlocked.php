<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if(auth()->user()->status == 0){

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error','Usuário desativado. Aguarde o administrador liberar sua conta para utilizar o sistema.');
        }
        return $next($request);
    }
}
