<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
use App\Models\User;

class setCurrentCompany {
    public function handle(Request $request, Closure $next): Response {
        $company = Company::where('name', str_replace('-', ' ', $request->route('company')))->first();
    
        if(!$company) {
            abort(400, "La empresa no existe"); 
        }

        Auth::user()->current_company = $company->id; 
        Auth::user()->save();

        User::where('id', Auth::user()->id)->update(['current_company' => $company->id]);

        return $next($request);
    }
}
