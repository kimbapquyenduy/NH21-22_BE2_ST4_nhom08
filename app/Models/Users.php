<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUsers(){
        $users = DB::select('SELECT * FROM `users`,`role` WHERE `users`.`role_id`=`role`.`role_id` ORDER BY `users`.`id` DESC;');
        return $users;  
    }
    public function addUser($data){
        DB::insert('INSERT INTO `users`(`name`, `email`,`password`,`role_id`) VALUES (?,?,?,?)',$data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }

    public function updateUser($data,$id){
        $data[] = $id;
        return DB::update("UPDATE $this->table SET `name`='?',`email`='?',`password`='?',`role_id`='?' WHERE id = ?",$data);
    }

    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
    protected $fillable = ['name','email','password','role'];
}
