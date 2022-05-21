<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class products extends Model
{
    use HasFactory;
    protected $table = 'product';
    public function getAllProduct(){
        $type = DB::select("SELECT * FROM `product` ORDER BY `product`.`id` DESC");
        return $type;  
    }

    public function addProduct($data){
        DB::insert('INSERT INTO `product`(`product_name`, `product_price`, `product_img`,
         `product_description`, `product_feature`, `product_sale_amount`,
         `stock`, `sale_amount`, `expire_date`, `discound_id`, `manufacture_id`, `type_id`, `review_id`) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)',$data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function deleteProduct($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
}
