<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWholesaler extends Model {
    use HasFactory;

    public $table = "company_wholesalers";
    public $timestamps = false;

    protected $fillable = []; 

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function wholesaler() {
        return $this->belongsTo(Wholesaler::class);
    }
}
