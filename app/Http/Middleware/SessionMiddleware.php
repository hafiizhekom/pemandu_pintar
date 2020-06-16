<?php

namespace App\Http\Middleware;

use Closure;

class SessionMiddleware
{
    public function handle($request, Closure $next)
    {


        if (!$request->session()->has('email')) {
            return redirect('signin');
        }

        return $next($request);

    }
}
