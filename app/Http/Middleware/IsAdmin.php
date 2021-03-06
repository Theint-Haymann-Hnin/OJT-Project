<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->type == 0) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
