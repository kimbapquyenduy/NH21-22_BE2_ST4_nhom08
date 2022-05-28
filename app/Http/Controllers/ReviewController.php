<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Users;
class ReviewController extends Controller
{
    private $review;
    private $users;
    public function __construct(){
        $this->review = new Review();
        $this->users = new Users();
    }
    public function index_review(){
        $title = 'Lists review ';

        $review = new Review();

        $reviewList = $this->review->getAllReview();

        return view('clients.review.lists_review', compact('title','reviewList'));
    }
    public function add_review(){
        $title='Add review';
        $users = new Users();

        $usersList = $this->users->getAllUsers();
        return view('clients.review.add_review', compact('usersList'));
    }


    public function delete($comment_id=0){
        if(!empty($comment_id)){
            $reviewDetail = $this->review->getDetail($comment_id);
            if(!empty($reviewDetail[0])){
               $deleteStatus = $this->review->deleteReview($comment_id);
                if($deleteStatus){
                    $msg = 'Delete review not successfully';
                }}}
        return redirect()->route('review.index_review')->with('msg',$msg);
    }
}
