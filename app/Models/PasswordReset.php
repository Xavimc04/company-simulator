<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {
    use HasFactory;

    public $table = "password_reset_tokens";

    public $fillable = [
        "email", 
        "token"
    ]; 
 
    public $timestamps = false;
}
