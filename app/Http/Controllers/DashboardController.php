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
            $product = Product::paginate(4);
            $product_type = Product_type::all();
            return view('main', ['data' => $product, 'datatype' => $product_type]);
        } else if (Auth::user()->hasRole('admin')) {
            return view('admin');
        }
    }
}
