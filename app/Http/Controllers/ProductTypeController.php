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
}
