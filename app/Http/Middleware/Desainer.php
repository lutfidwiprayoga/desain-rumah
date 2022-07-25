<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Desainer
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level == 2) {
            return $next($request);
        }
        return redirect('/order');
    }
}
