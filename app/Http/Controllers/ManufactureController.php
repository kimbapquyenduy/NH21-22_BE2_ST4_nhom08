<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use App\Models\Product;

class ManufactureController extends Controller
{
    private $manufacture;
    public function __construct(){
        $this->manufacture = new Manufacture();
    }
    public function index_manufacture(){
        $title = 'Lists Manufacture ';

        $manufacture = new Manufacture();

        $manufacturesList = $this->manufacture->getAllManufacture();

        return view('clients.manufacture.lists_manufacture', compact('title','manufacturesList'));
    }

    public function add_manufacture(){
        $title='Add manufacture';
        return view('clients.manufacture.add_manufacture', compact('title'));
    }

    public function postAdd_manufacture(Request $request){
        $request-> validate([
            'manufacture_name'=>'required|min:2'
        ],[
            'manufacture_name.required' =>'Manufacture Name is required to enter'
        ]);
        $dataInsert = [
            $request->manufacture_name,
            date('Y-m-d H:i:s'),           
        ];
        $this->manufacture->addManufacture($dataInsert);
        return redirect()->route('manufacture.index_manufacture')->with('msg','Add successfully');
    }
    public function delete($id=0){
        $Product = Product::where('manufacture_id', $id)->get();
        if (  $Product->count()<=0) {
            if(!empty($id)){
                $manufactureDetail = $this->manufacture->getDetail($id);
                if(!empty($manufactureDetail[0])){
                   $deleteStatus = $this->manufacture->deleteManufacture($id);
                    if($deleteStatus){
                        $msg = 'Delete manufacture not successfully';
                    }else{
                        $msg = 'you can not delete now, please come back later';
                    }
                }else{
                    $msg = 'manufacture exist';
                }
            }else{
                $msg = 'link exist';
            }
        }
        else {       
        }     
        return redirect()->route('manufacture.index_manufacture');
    }

    public function edit($id){
        $manufacture = Manufacture::find($id);
        return view('clients.manufacture.edit',compact('manufacture'));
    }
    public function update(Request $request,$id){
        $manufacture = Manufacture::find($id);
        $manufacture->manufacture_name = $request->input('manufacture_name');
        date('Y-m-d H:i:s');
        $manufacture->update();
        return redirect('manufacture')->with('msg','manufacture data updated successfully');

    }
}
