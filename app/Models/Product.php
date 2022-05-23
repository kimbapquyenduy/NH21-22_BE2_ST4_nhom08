<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';
    use HasFactory;
    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, "manufacture_id");
    }
    public function productType()
    {
        return $this->belongsTo(Product_type::class, "product_type_id");
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'review_id', 'product_id');
    }
}
