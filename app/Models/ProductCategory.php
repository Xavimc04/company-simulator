<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
    use HasFactory;

    public $table = "product_categories"; 

    public $timestamps = false; 

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id'); 
    }
}
