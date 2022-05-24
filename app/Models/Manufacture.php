<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Manufacture extends Model
{
    use HasFactory;
    protected $table = 'manufacture';

    protected $fillable = ['manufacture_name'];
    public function Products()
    {
        return $this->hasMany(Product::class, 'id', 'id');
    }


    public function getAllManufacture(){
        $manufacture = DB::select('SELECT * FROM `manufacture` ORDER BY `id` DESC');
        return $manufacture;  
    }
    
    public function addManufacture($data){
        DB::insert('INSERT INTO `manufacture`(`manufacture_name`,`created_at`) VALUES (?,?)',$data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }

    public function deleteManufacture($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
}
