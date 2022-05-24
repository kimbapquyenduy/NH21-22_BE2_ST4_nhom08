<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product_type extends Model
{

    use HasFactory;
    protected $table = 'product_type';
    
    public function Products()
    {
        return $this->hasMany(Product::class, 'product_type_id', 'id');
    }


    protected $fillable = ['id','type_name','type_img'];
    public function getAllType(){
        $type = DB::select("SELECT * FROM `product_type` ORDER BY `product_type`.`id` DESC");
        return $type;  
    }
    public function addType($data){
        DB::insert('INSERT INTO `product_type`(`type_name`,`type_img`,`created_at`) VALUES (?,?,?)',$data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }

    public function deleteType($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }

    public function updateType($data,$id){
        $data[] = $id;
        return DB::update("UPDATE $this->table SET `type_name`='?'WHERE id = ?",$data);
    }
}
