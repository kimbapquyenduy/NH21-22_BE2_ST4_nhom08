<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use SebastianBergmann\Type\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    private $users;
    public function __construct(){
        $this->users = new Users();
    }
    public function index(){
        $title = 'Lists users';

        $users = new Users();

        $usersList = $this->users->getAllUsers();

        return view('clients.users.lists', compact('title','usersList'));
    }
    public function add(){
        $title='Add lists users';

        $users = new Users();

        $usersList = $this->users->getAllUsers();

        return view('clients.users.add', compact('title','usersList'));
    }

    public function postAdd(Request $request){
        $request-> validate([
            'name'=>'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ],[
            'name.required' =>'full name is required to enter ',
            'name.min'=>'Full name with minimum 5 characters or more',
            'email.required' => "Email required to enter",
            'email.email'=> 'Email Malformed',
            'email.unique'=>'already exists in the system'
        ]);
        //return 'ok';
        $dataInsert = [
            $request->name,
            $request->email,
            $request->password = hash::make('password'),
            date('Y-m-d H:i:s'),
         
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg','Add successfully');
    }

    public function edit($id){
        $users = Users::find($id);
        return view('clients.users.edit',compact('users'));
    }

    public function update(Request $request,$id){
        $users = Users::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        date('Y-m-d H:i:s');
        $users->update();
        return redirect('users')->with('msg','users data updated successfully');

    }

    public function delete($id=0){
        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
               $deleteStatus = $this->users->deleteUser($id);
                if($deleteStatus){
                    $msg = 'delete users not successfully';
                }else{
                    $msg = 'you can not now, please come back later';
                }
            }else{
                $msg = 'Product exist';
            }
        }else{
            $msg = 'Link exist';
        }
        return redirect()->route('users.index')->with('msg',$msg);
    }
}
