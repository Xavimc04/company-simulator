<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wholesaler extends Model {
    use HasFactory;

    protected $guarded = []; 

    public $table = "wholesalers"; 

    public function center() {
        return $this->belongsTo(Center::class);
    }

    public function companyWholesalers() {
        return $this->hasMany(CompanyWholesaler::class);
    }
}
