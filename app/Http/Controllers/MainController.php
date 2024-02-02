<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company; 
use Illuminate\Support\Facades\Auth;
use App\Models\Product; 

class MainController extends Controller {
    public function company($company) {
        $company = Company::where('name', str_replace('-', ' ', $company))->first(); 

        if(!$company) {
            return redirect('/teacher/companies'); 
        }

        return view('web.sections.authorized.teacher.single-company', [
            'company' => $company
        ]);
    }

    public function marketCompany(Request $request, $company) {
        $product = $request->query('product'); 

        $requestCompany = Company::where('name', str_replace('-', ' ', $company))->first();

        $isCompanyProduct = Product::where('company_id', $requestCompany->id)->where('label',  str_replace('-', ' ', $product))->exists();

        return view('web.sections.authorized.market.company', [
            'company' => $company,
            'product' => $isCompanyProduct ? $product : false
        ]);
    }
}
