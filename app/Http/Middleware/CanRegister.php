<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User; 

class CanRegister {
    public function handle(Request $request, Closure $next): Response { 
        if(User::count() > 0) return redirect('/login');
        
        return $next($request);
    }
}
