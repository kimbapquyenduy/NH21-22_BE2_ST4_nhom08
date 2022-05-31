<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Manufacture;
use App\Models\Users;
use App\Models\Review;

class ProductController extends Controller
{
    private $product;
    private $review;
    private $product_type;
    private $manufacture;
    private $users;
    public function __construct(){
        $this->product = new Product();
        $this->product_type = new Product_type();
        $this->manufacture = new Manufacture();
        $this->users = new Users();
        $this->review = new Review();
    }

    public function index_product(){
        $title = 'Lists products ';

        $product = new Product();
        
        $productList = $this->product->getAllProduct();

        return view('clients.products.lists_product', compact('title','productList'));
    }

    public function show_product(){
        $title = 'Lists products ';

        $product = new Product();
        
        $productList =$this->product->count('id');
        $typeList = $this->product_type->count('id');
        $manufacturesList = $this->manufacture->count('id');
        $usersList = $this->users->count('id');
        return view('admin', compact('productList','typeList','manufacturesList','usersList'));
    }
    public function add_product(){
        $title='Add product';   
        $reviewList = $this->review->getAllReview();    
        $product_type = new Product_type();
        $typeList = $this->product_type->getAllType();
        $manufacture = new Manufacture();
        $manufacturesList = $this->manufacture->getAllManufacture();
        return view('clients.products.add_product', compact('reviewList','typeList','manufacturesList'));
    }

    public function postAdd_product(Request $request){
        $request-> validate([
            'product_name'=>'required|min:5',
            'product_price' => 'required',
            'product_img' => 'required',
            'product_description' => 'required',
            'product_feature' => 'required',
            'stock' => 'required',
            'sale_amount' => 'required'
        ],[
            'product_name.required' =>'Product Name is required to enter',
            'product_price.required' =>'Price required to enter',
            'product_img.required' =>'img required to enter',
            'product_description.required' =>'description required to enter',
            'product_feature.required' =>'feature required to enter',
            'stock.required' =>'Stock required to enter',
            'sale_amount.required' =>'sale amount required to enter'
            
        ]);
        if($request->hasfile('product_img')){
            $file = $request->file('product_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/',$filename);
        };
        
        $dataInsert = [
            $request->product_name,
            $request->product_price,
            $request->product_img = $filename,
            $request->product_description,
            $request->product_feature,
            $request->stock,
            $request->sale_amount,
            $request->expire_date ,
            $request->manufacture_id,
            $request->type_id,
            0,
            
            date('Y-m-d H:i:s'),
        ];
        $this->product->addProduct($dataInsert);
        return redirect()->route('product.index_product')->with('msg','Add successfully');
    }
     public function checkwl()
    {
        if (Auth::check()) {
            
        }
    }
    public function delete($id=0){
        if(!empty($id)){
            $productDetail = $this->product->getDetail($id);
            if(!empty($productDetail[0])){
               $deleteStatus = $this->product->deleteProduct($id);
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

    public function edit($id){
        $reviewList = $this->review->getAllReview();
        $product = Product::find($id);
        $product_type = new Product_type();
        $typeList = $this->product_type->getAllType();
        $manufacture = new Manufacture();
        $manufacturesList = $this->manufacture->getAllManufacture();
        return view('clients.products.edit_product',compact('reviewList','product','typeList','manufacturesList'));
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        if($request->hasfile('product_img')){
            $file = $request->file('product_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/',$filename);
        };
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $imgs = $product->product_img = $filename;
        $imgs = $request->input('product_img');
        $product->product_description = $request->input('product_description');
        $product->product_feature = $request->input('product_feature');
        $product->stock = $request->input('stock');
        $product->sale_amount = $request->input('sale_amount');
        $product->expire_date = $request->input('expire_date');
        $product->manufacture_id = $request->input('manufacture_id');
        $product->type_id = $request->input('type_id');
        $product->comment_id = 0; 
        date('Y-m-d H:i:s');
        $product->update();
        return redirect('product')->with('msg','product data updated successfully');

    }
}