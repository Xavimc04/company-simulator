<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isTeacher {
    public function handle(Request $request, Closure $next): Response {
        if(Auth::user() && Auth::user()->role_id && Auth::user()->role->name == "Administrador") {
            return $next($request);
        } 

        return redirect('/');
    }
}
