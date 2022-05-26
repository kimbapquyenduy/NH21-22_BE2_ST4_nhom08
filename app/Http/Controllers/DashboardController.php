<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Product_type;
use Gloudemans\Shoppingcart\Facades\Cart;



class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $product = Product::all();
            $product_type = Product_type::all();
            $Productbs = Product::orderby('sale_amount', 'ASC')->limit(10)->get();
            $Productnew = Product::orderby('created_at', 'DESC')->limit(10)->get();
            return view('main', ['data' => $product, 'datatype' => $product_type, 'bs' => $Productbs, 'new' => $Productnew]);
        } else if (Auth::user()->hasRole('admin')) {
            return view('admin');
        }
    }
}
