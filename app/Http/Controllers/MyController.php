<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class MyController extends Controller
{
    function index()
    {
        $product = Product::all();
        return view('main', ['data' => $product]);
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
    // function getCartItemByUserId($Userid = " ")
    // {
    //     $product = Product::all();
    //     $cartItem = Cart::where('user_id', $Userid)->get();
    //     return view('main', ['cartitem' => $cartItem, 'data' => $product]);
    // }
}
