<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class LoginCheckMiddleware
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
        $login =$request->session()->has('token');
        if($login){
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
