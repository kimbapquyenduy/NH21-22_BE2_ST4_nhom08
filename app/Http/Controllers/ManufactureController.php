<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;
class ManufactureController extends Controller
{
    private $manufactures;
    public function __construct(){
        $this->manufactures = new Manufactures();
    }
    public function index_manufacture(){
        $title = 'Lists Manufacture ';

        $Manufactures = new Manufactures();

        $manufacturesList = $this->manufactures->getAllManufacture();

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
            $request->manufacture_name           
        ];
        $this->manufactures->addManufacture($dataInsert);
        return redirect()->route('manufacture.index_manufacture')->with('msg','Add successfully');
    }
    public function delete($manufacture_id=0){
        if(!empty($manufacture_id)){
            $manufactureDetail = $this->manufactures->getDetail($manufacture_id);
            if(!empty($manufactureDetail[0])){
               $deleteStatus = $this->manufactures->deleteManufacture($manufacture_id);
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
        return redirect()->route('manufacture.index_manufacture')->with('msg',$msg);
    }
}
