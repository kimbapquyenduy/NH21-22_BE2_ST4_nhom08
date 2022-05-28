<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = ['comment','comment_name', 'comment_product_id' ,'datetime'];
    protected $primarykey = 'comment_id';
    public function product()
    {
        return $this->belongsTo(Product::class, "id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function deleteCM($id){
        return DB::delete("DELETE FROM $this->table WHERE comment_id=?",[$id]);
    }

    public function getAllReview(){
        $review = DB::select('SELECT `review`.`id`,`users`.`name`,`comment`,`datetime` 
        FROM `review`,`users` 
        WHERE `review`.`user_id`= `users`.`id` 
        ORDER BY `review`.`id` DESC;');
        return $review;  
    }

    public function addRv($data){
        DB::insert('INSERT INTO `review`(`ratting`, `user_id`, `id`, `comment`, `datetime`, `created_at`)
        VALUES (?,?,?,?,?,?)',$data);
    }
    public function addReview($data){
        DB::insert('INSERT INTO `review`( `user_id`, `comment`, `datetime`) VALUES (?,?,?)',$data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function deleteReview($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }
}
