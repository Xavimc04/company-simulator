<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company; 
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {
    public function company($company_id) {
        $company = Company::find($company_id); 

        if(!$company) {
            return redirect('/teacher/companies'); 
        }

        return view('web.sections.authorized.teacher.single-company', [
            'company' => $company
        ]);
    }
}
