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

    public function postAdd_review(Request $request){
        $request-> validate([
            'user_id'=>'required',
            'comment'=>'required|min:5',

        ],[
            'user_id.required' =>'user_id required to enter',
            'comment.required' =>'ratting required to enter',
            'comment.min:5' =>'comment with minimum 5 characters or more'
        ]);
        $dataInsert = [ 
            $request->user_id,         
            $request->comment,   
            $request->datetime,  
            date('Y-m-d H:i:s'),
        ];
        $this->review->addReview($dataInsert);
        return redirect()->route('review.index_review')->with('msg','Add successfully');
    }
    public function edit($id){
        $review = Review::find($id);
        $users = new Users();
        $usersList = $this->users->getAllUsers();
        return view('clients.review.edit',compact('review','usersList'));
    }
    public function update(Request $request,$id){
        $review = Review::find($id);
        $review->user_id = $request->input('user_id');
        $review->comment = $request->input('comment');
        $review->datetime = $request->input('datetime');
        date('Y-m-d H:i:s');
        $review->update();
        return redirect('review')->with('msg','review data updated successfully');

    }

    public function delete($id=0){
        if(!empty($id)){
            $reviewDetail = $this->review->getDetail($id);
            if(!empty($reviewDetail[0])){
               $deleteStatus = $this->review->deleteReview($id);
                if($deleteStatus){
                    $msg = 'Delete review not successfully';
                }else{
                    $msg = 'you can not delete now, please come back later';
                }
            }else{
                $msg = 'review exist';
            }
        }else{
            $msg = 'link exist';
        }
        return redirect()->route('review.index_review')->with('msg',$msg);
    }
}
