<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Manufactures extends Model
{
    use HasFactory;
    protected $table = 'manufacture';
    public function getAllManufacture(){
        $manufacture = DB::select('SELECT * FROM `manufacture` ORDER BY `manufacture_id` DESC');
        return $manufacture;  
    }
    
    public function addManufacture($data){
        DB::insert('INSERT INTO `manufacture`(`manufacture_name`) VALUES (?)',$data);
    }

    public function getDetail($manufacture_id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE manufacture_id = ?',[$manufacture_id]);
    }

    public function deleteManufacture($manufacture_id){
        return DB::delete("DELETE FROM $this->table WHERE manufacture_id=?",[$manufacture_id]);
    }
}