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
        $users = DB::select('SELECT * FROM `users` ORDER BY `users`.`id` DESC;');
        return $users;  
    }
    public function addUser($data){
        DB::insert('INSERT INTO `users`(`name`, `email`,`password`,`created_at`) VALUES (?,?,?,?)',$data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }

    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
    protected $fillable = ['name','email','password'];
}
