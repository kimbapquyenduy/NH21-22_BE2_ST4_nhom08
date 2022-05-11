<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;

class MyController extends Controller
{
    function index()
    {
        $product = Product::all();
        $product = Product::paginate(4);
        $product_type = Product_type::all();
        return view('main', ['data' => $product, 'datatype' => $product_type]);
    }
    function page($name = "/")
    {
        $product = Product::all();
        return view($name, ['data' => $product]);
    }
    function getProductById($id)
    {
        $product = Product::all();
        $productdetail = Product::where('product_id', $id)->get();
        // $manu = Product::where('manufacture_id', $product->manufacture_id)->get();
        return view('shop-detail', ['dat' => $productdetail,'data' => $product]);
    }
    function getProductByTypeID($id)
    {
        $product = Product::where('type_id', $id)->get();
        return view('producttype', ['productType' => $product]);
    }
    // function getProductByManuID($id)
    // {
    //     $product = Product::where('manufacture_id', $id)->get();
    //     return view('shop-detail', ['manu' => $product]);
    // }
    function searchProductByName(Request $request)
    {
        if($request->isMethod('post')){
            $search = $request->get('key');
            if($search != ""){
                $product = Product::where('product_name','LIKE','%'.$search.'%')->paginate(4);
            }
            else{
                $product = Product::all();
            }
            
        }
        return view('search', compact('product'));
    }

    // function getCartItemByUserId($discountID)
    // {
    //     $product = Product::all();
    //     $discount = discount::where('discount_id', $discountID)->get();
    //     return view('main', ['cartitem' => $cartItem, 'data' => $product]);
    // }
}
