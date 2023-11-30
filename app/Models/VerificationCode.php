<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function center() {
        return $this->belongsTo(Center::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
