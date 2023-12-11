<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isStudent {
    public function handle(Request $request, Closure $next): Response {
        if(Auth::user() && Auth::user()->role_id && Auth::user()->role->name == "Estudiante") {
            return $next($request);
        } 

        return redirect('/');
    }
}
