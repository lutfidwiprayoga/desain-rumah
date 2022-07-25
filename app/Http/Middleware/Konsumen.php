<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Konsumen
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level == 3) {
            return $next($request);
        }
        return redirect('/');
    }
}
