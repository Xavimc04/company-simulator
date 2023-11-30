<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isStudent {
    public function handle(Request $request, Closure $next): Response {
        if(Auth::user() && Auth::user()->role_id && Auth::user()->role->name == "Estudiante") {
            return $next($request);
        } 

        return $next($request);
    }
}
