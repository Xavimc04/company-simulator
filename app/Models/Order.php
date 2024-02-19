<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $guarded = []; 

    public function seller() {
        return $this->belongsTo(Company::class, 'seller_company_id');
    }

    public function buyer() {
        return $this->belongsTo(Company::class, 'buyer_company_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->hasMany(OrderProduct::class);
    }
}
