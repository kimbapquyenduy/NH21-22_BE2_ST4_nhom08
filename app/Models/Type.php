<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model
{
    use HasFactory;
    protected $table = 'product_type';
    public function getAllType(){
        $type = DB::select("SELECT * FROM `product_type` ORDER BY `product_type`.`type_id` ASC");
        return $type;  
    }
    public function addType($data){
        DB::insert('INSERT INTO `product_type`(`type_name`) VALUES (?)',$data);
    }

    public function getDetail($type_id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE type_id = ?',[$type_id]);
    }

    public function deleteType($type_id){
        return DB::delete("DELETE FROM $this->table WHERE type_id=?",[$type_id]);
    }

    public function updateType($data,$type_id){
        $data[] = $type_id;
        return DB::update("UPDATE $this->table SET `type_name`='?'WHERE type_id = ?",$data);
    }

}
