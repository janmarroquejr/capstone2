<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if((Auth::user() && Auth::user()->role == 'admin') || (Auth::user() && Auth::user()->role == 'super_admin')){
            return $next($request);
        }
        return redirect('/menu');
    }
}
            
