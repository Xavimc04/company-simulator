<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyEmployee; 
use App\Models\Company; 

class isCompanyEmployee { 
    public function handle(Request $request, Closure $next): Response {
        $company = Company::where('name', str_replace('-', ' ', $request->route('company')))->first();
    
        if(!$company) {
            abort(404, "La empresa no existe"); 
        }

        if(!CompanyEmployee::where('user_id', Auth::user()->id)->where('company_id', $company->id)->first()) {
            abort(403, "No tienes acceso a esta empresa");
        }

        return $next($request);
    
        return redirect('/');
    }
}
