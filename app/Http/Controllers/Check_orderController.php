<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use DB;
class Check_orderController extends Controller
{
    private $checkout;
    public function __construct()
    {
        $this->checkout = new Checkout();
    }
    public function index_Checkout()
    {
        $title = 'Lists Checkout ';

        $checkout = new Checkout();

        $checkoutList = $this->checkout->getAllCheckout();

        return view('clients.check_order.lists_checkout', compact('title', 'checkoutList'));
    }
    public function delete($id=0){
        if(!empty($id)){
            $checkoutDetail = $this->checkout->getDetail($id);
            if(!empty($checkoutDetail[0])){
               $this->checkout->deleteCheckOut($id);
            }
        }
        return redirect()->route('checkout.index_Checkout');
    }


}
