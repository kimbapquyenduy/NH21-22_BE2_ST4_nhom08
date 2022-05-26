<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
class Check_orderController extends Controller
{  
      private $checkout;
    public function __construct(){
        $this->checkout = new Checkout();
    }
    public function index_Checkout(){
        $title = 'Lists Checkout ';

        $checkout = new Checkout();

        $checkoutList = $this->checkout->getAllCheckout();

        return view('clients.check_order.lists_checkout', compact('title','checkoutList'));
    }
}
