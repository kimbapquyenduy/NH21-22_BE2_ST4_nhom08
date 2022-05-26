<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    
    public function addWL($data){
        DB::insert('INSERT INTO `wishlist`(`user_id`, `product_name`, `product_img`,
         `product_price`,`product_stock`, `created_at`) 
         VALUES (?,?,?,?,?,?)',$data);
    }
    public function deleteWL($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
}
