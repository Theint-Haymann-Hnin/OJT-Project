<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
   
    public function handle(Request $request, Closure $next)
    {
        if( auth()->check()== true && auth()->user()->type == 0){
            return $next($request);
          
        }
        return redirect('/');
        
        // return redirect()->back();
    }
}

