<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
   
    public function handle(Request $request, Closure $next)
    {
        if( auth()->check() == true){
            return $next($request);
        }
        return redirect('/');
    }
}

