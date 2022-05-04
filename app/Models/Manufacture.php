<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    public function Products()
    {
        return $this->hasMany(Product::class, 'manufacture_id', 'product_id');
    }
}
