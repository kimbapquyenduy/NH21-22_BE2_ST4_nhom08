<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_type;
use Dotenv\Util\Str;
use App\Models\Product;

class TypeController extends Controller
{
    private $product;
    private $product_type;
    public function __construct(){
        $this->product_type = new Product_type();
        $this->product = new Product();
    }
    public function index_type(){
        $title = 'Lists product types ';

        $product_type = new Product_type();

        $typeList = $this->product_type->getAllType();

        return view('clients.types.lists_product_type', compact('title','typeList'));
    }
    public function add_type(){
        $title='Add product type';
        return view('clients.types.add_type', compact('title'));
    }
    public function postAdd_type(Request $request){
        
        $request-> validate([
            'type_name'=>'required|min:2',
            'type_img'=>'required'
        ],[
            'type_name.required' =>'product type name required to enter',
            'type_img.required' =>'product type img required to enter'
        ]);

        if($request->hasfile('type_img')){
            $file = $request->file('type_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/',$filename);
        };

        $dataInsert = [
            $request->type_name,  
            $request->type_img = $filename,
            date('Y-m-d H:i:s'),
           
        ];
        $this->product_type->addType($dataInsert);
        return redirect()->route('type.index_type')->with('msg','Add product type');
    }

    public function delete($id=0){

        $Product = Product::where('type_id', $id)->get();
        
        if ($Product->count()<=0) {
            if(!empty($id)){
                $typeDetail = $this->product_type->getDetail($id);
                if(!empty($typeDetail[0])){
                   $deleteStatus = $this->product_type->deleteType($id);
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
        }
        else {
          
        }

        return redirect()->route('type.index_type');
    }

    public function edit($id =0){
        $product_type = Product_type::find($id);
        return view('clients.types.edit_type',compact('product_type'));
    }

    public function update(Request $request,$id){
        $product_type = Product_type::find($id);
        if($request->hasfile('type_img')){
            $file = $request->file('type_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/',$filename);
        };
        $product_type->type_name = $request->input('type_name');
        $test=$product_type->type_img= $filename;
        $test = $request->input('type_img');
        date('Y-m-d H:i:s');
        $product_type->update();
        return redirect('type')->with('msg','users data updated successfully');

    }
}