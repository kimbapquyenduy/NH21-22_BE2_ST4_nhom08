<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;

class MyController extends Controller
{
    function getProductType()
    {
        $product_type = Product::all();
        return view('main', ['date' => $product_type]);
    }
    // function getCartItemByUserId($Userid = " ")
    // {
    //     $product = Product::all();
    //     $cartItem = Cart::where('user_id', $Userid)->get();
    //     return view('main', ['cartitem' => $cartItem, 'data' => $product]);
    // }
}
