<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;
    public function Products()
    {
        return $this->hasMany(Product::class, 'product_type_id', 'product_id');
    }
}
