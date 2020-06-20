<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }elseif (Auth::check() && Auth::user()->level == 'user'){
            return redirect('');
        }
        else return redirect()->route('login.admin');
        //else return redirect()->route("welcom");
    }
}
