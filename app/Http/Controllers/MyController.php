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
        $product = Product::where('product_id', $id)->get();
        return view('shop-detail', ['dat' => $product]);
    }
    function getProductByTypeID($id)
    {
        $product = Product::where('type_id', $id)->get();
        return view('producttype', ['productType' => $product]);
    }
    function searchProductByName(Request $request)
    {
        if($request->isMethod('post')){
            $search = $request->get('key');
            $product = Product::where('product_name','LIKE','%'.$search.'%')->paginate(4);
        }
        
        return view('search', compact('product'));
    }
    // function getProductType()
    // {
    //     $product_type = Product_type::all();
    //     return view('main', ['datatype' => $product_type]);
    // }
    // function getCartItemByUserId($Userid = " ")
    // {
    //     $product = Product::all();
    //     $cartItem = Cart::where('user_id', $Userid)->get();
    //     return view('main', ['cartitem' => $cartItem, 'data' => $product]);
    // }
}
