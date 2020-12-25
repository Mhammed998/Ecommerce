<?php

namespace App\Http\Middleware;

use Closure;

class changeLang
{

    public function handle($request, Closure $next)
    {






        return $next($request);
    }
}
