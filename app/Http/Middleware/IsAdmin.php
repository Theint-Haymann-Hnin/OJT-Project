<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
   
    // public function handle(Request $request, Closure $next)
    // {    
        
    //     if(auth()->user()->type == 0 ){
    //         return $next($request);
    //     } else{
    //         return redirect('/');
    //     }
    // }
    public function handle(Request $request, Closure $next)
    {
        if( auth()->user() != ""){
            return $next($request);
        }else{
           return redirect('login');
        } 
    }
}

