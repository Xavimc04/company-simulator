<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;

class doesCompanyExist {
    public function handle(Request $request, Closure $next): Response {
        $company = Company::where('name', str_replace('-', ' ', $request->route('company')))->first();
    
        if(!$company) {
            abort(400, "La empresa no existe"); 
        }

        return $next($request);
    }
}
