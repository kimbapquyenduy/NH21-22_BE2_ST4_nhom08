<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    private $products;
    public function __construct(){
        $this->products = new Products();
    }
    public function index_product(){
        $title = 'Lists products ';

        $products = new Products();

        $productList = $this->products->getAllProduct();

        return view('clients.products.lists_product', compact('title','productList'));
    }
    public function add_product(){
        $title='Add product';
        return view('clients.products.add_product', compact('title'));
    }

    public function postAdd_product(Request $request){
        $request-> validate([
            'product_name'=>'required|min:5',
            'product_price' => 'required',
            'product_img' => 'required',
            'product_description' => 'required',
            'product_feature' => 'required',
            'product_sale_amount' => 'required',
            'stock' => 'required',
            'sale_amount' => 'required'
        ],[
            'product_name.required' =>'Product Name is required to enter',
            'product_price.required' =>'Price required to enter',
            'product_img.required' =>'img required to enter',
            'product_description.required' =>'description required to enter',
            'product_feature.required' =>'feature required to enter',
            'product_sale_amount.required' =>'product sale amount required to enter',
            'stock.required' =>'Stock required to enter',
            'sale_amount.required' =>'sale amount required to enter'
            
        ]);
        //return 'ok';
        $dataInsert = [
            $request->product_name,
            $request->product_price,
            $request->product_img,
            $request->product_description,
            $request->product_feature,
            $request->product_sale_amount,
            $request->stock,
            $request->sale_amount,
            $request->expire_date=>date('mm/dd/yy'),
            $request->discound_id,
            $request->manufacture_id,
            $request->type_id,
            $request->review_id,
        ];
        $this->products->addProduct($dataInsert);
        return redirect()->route('product.index_product')->with('msg','Add successfully');
    }
    public function delete($id=0){
        if(!empty($id)){
            $productDetail = $this->products->getDetail($id);
            if(!empty($productDetail[0])){
               $deleteStatus = $this->products->deleteProduct($id);
                if($deleteStatus){
                    $msg = 'Delete product not successfully';
                }else{
                    $msg = 'you can not delete now, please come back later';
                }
            }else{
                $msg = 'Product exist';
            }
        }else{
            $msg = 'link exist';
        }
        return redirect()->route('product.index_product')->with('msg',$msg);
    }
}