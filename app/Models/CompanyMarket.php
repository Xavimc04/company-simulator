<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMarket extends Model{
    use HasFactory;

    public $timestamps = false;

    public $table = "company_market";

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
