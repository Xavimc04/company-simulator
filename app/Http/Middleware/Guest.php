<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Guest {
    public function handle(Request $request, Closure $next): Response {
        if(Auth::check()) {
            return redirect('/'); 
        }
        
        return $next($request);
    }
}
