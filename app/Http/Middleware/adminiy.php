<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class adminiy
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->user_type==1){
                return $next($request);
            }
        }
        return redirect()->route('login')->with('notify_error','You need to login before accessing Admin Dashboard');
    }
    public function terminate($request, $response){
    	
    }
}
