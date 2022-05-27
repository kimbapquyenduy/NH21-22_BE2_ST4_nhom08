<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';
    protected $fillable = ['status'];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getAllCheckout()
    {
        $checkout = DB::select("SELECT `checkout`.`id`,`product_name`,`product_price`,`product_img`,
        `quanity`,`name`,`status` FROM `checkout`,`users` WHERE `checkout`.`user_id`=`users`.`id` 
        ORDER BY `checkout`.`id` DESC;");
        return $checkout;
    }
    public function addOder($data)
    {
        DB::insert('INSERT INTO `checkout`( `product_name`,`product_price`, `product_img`,`status`,`quanity`,
          `user_id`,`created_at`) 
         VALUES (?,?,?,?,?,?,?)', $data);
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function deleteCheckOut($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }
}
