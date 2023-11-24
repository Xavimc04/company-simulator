<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $guarded = [];

    public function center() {
        return $this->belongsTo(Center::class);
    }

    public function teachers() {
        return $this->hasMany(CompanyTeacher::class);
    }

    public function marketQuestions() {
        return $this->hasMany(CompanyMarket::class);
    }

    public function employees() {
        return $this->hasMany(CompanyEmployees::class);
    }
}
