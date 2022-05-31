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
        $review = DB::select('SELECT `review`.`comment_id`,`product`.`product_name`,`comment`,`comment_name`,`rating`
        FROM `review`,`product` WHERE `review`.`comment_id`=`product`.`id` 
        ORDER BY `review`.`comment_id` DESC');
        return $review;  
    }

    public function addRv($data){
        DB::insert('INSERT INTO `review`(`ratting`, `user_id`, `id`, `comment`, `datetime`, `created_at`)
        VALUES (?,?,?,?,?,?)',$data);
    }

    public function getDetail($comment_id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE comment_id = ?',[$comment_id]);
    }
    public function deleteReview($comment_id){
        return DB::delete("DELETE FROM $this->table WHERE comment_id=?",[$comment_id]);
    }
}
