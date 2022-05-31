<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
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

    public function getAllProduct(){
        $type = DB::select("SELECT `product`.`id`,`product_name`,`product_price`,`product_img`,
         `product_description`,`product_feature`,`stock`, `sale_amount`,`expire_date`,
         `manufacture`.`manufacture_name`,`product_type`.`type_name` 
         FROM `product`,`manufacture`,`product_type` 
         WHERE `product`.`manufacture_id`=`manufacture`.`id` 
         AND `product`.`type_id`=`product_type`.`id` 
            
        ORDER BY `product`.`id` DESC;");
        return $type;  
    }

    public function addProduct($data){
        DB::insert('INSERT INTO `product`(`product_name`, `product_price`, `product_img`,
         `product_description`, `product_feature`,
         `stock`, `sale_amount`, `expire_date`, `manufacture_id`, `type_id`, `comment_id`,`created_at`) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?)',$data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function deleteProduct($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
    protected $fillable = ['product_name', 'product_price', 'product_img',
    'product_description', 'product_feature',
    'stock', 'sale_amount', 'expire_date', 'manufacture_id', 'type_id', 'comment_id'];
}
