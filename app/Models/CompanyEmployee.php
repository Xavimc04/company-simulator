<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmployee extends Model {
    use HasFactory;

    public $table = "company_employees";

    protected $guarded = []; 

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
