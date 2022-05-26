<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Checkout extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function addOder($data)
    {
        DB::insert('INSERT INTO `checkout`( `product_name`,`product_price`, `product_img`,`status`,`quanity`,
          `user_id`) 
         VALUES (?,?,?,?,?,?)', $data);
    }
}
