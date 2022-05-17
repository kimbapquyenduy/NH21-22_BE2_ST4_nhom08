<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    private $type;
    public function __construct(){
        $this->type = new Type();
    }
    public function index_type(){
        $title = 'Lists product types ';

        $type = new Type();

        $typeList = $this->type->getAllType();

        return view('clients.types.lists_product_type', compact('title','typeList'));
    }
    public function add_type(){
        $title='Add product type';
        return view('clients.types.add_type', compact('title'));
    }
    public function postAdd_type(Request $request){
        $request-> validate([
            'type_name'=>'required|min:2'
        ],[
            'type_name.required' =>'product type required to enter'
        ]);
        //return 'ok';
        $dataInsert = [
            $request->type_name           
        ];
        $this->type->addType($dataInsert);
        return redirect()->route('type.index_type')->with('msg','Add product type');
    }

    public function delete($type_id=0){
        if(!empty($type_id)){
            $typeDetail = $this->type->getDetail($type_id);
            if(!empty($typeDetail[0])){
               $deleteStatus = $this->type->deleteType($type_id);
                if($deleteStatus){
                    $msg = 'delete product type not successfully';
                }else{
                    $msg = 'You can not delete now, please come back later';
                }
            }else{
                $msg = 'product type exist';
            }
        }else{
            $msg = 'link exist';
        }
        return redirect()->route('type.index_type')->with('msg',$msg);
    }

    public function getEdit_type($type_id=0){
        $title='Update product types';
        if(!empty($type_id)){
            $typeDetail = $this->type->getDetail($type_id);
            if(!empty($typeDetail[0])){
                $typeDetail = $typeDetail[0];
            }else{
                return redirect()->route('type.index_type')->with('msg', 'users exist');
            }
        }else{
            return redirect()->route('type.index_type')->with('msg', 'link exist');

        }
        return view('clients.types.edit_type', compact('title','typeDetail'));
    }

    public function postEdit_type(Request $request, $type_id=0){
        $request-> validate([
            'type_name'=>'required|min:2'
        ],[
            'name.required' =>'type name required to enter '            
        ]);

        $dataUpdate = [
            $request->type_name        
        ];
        $this->type->updateType($dataUpdate,$type_id);
        return back()->with('msg','Update product types successfully');
    }
}