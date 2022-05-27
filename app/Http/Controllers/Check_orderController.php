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
    public function delete($id = 0)
    {
        if (!empty($id)) {
            $checkoutDetail = $this->checkout->getDetail($id);
            if (!empty($checkoutDetail[0])) {
                $this->checkout->deleteCheckOut($id);
            }
        }
        return redirect()->route('checkout.index_Checkout');
    }

    public function edit($id)
    {
        $checkout = Checkout::find($id);
        return view('clients.checkout.edit', compact('chk'));
    }

    public function update1($id)
    {
        Checkout::find($id)->update(array('status' => 'Process'));

        return redirect('checkout')->with('msg', 'Checkout data updated successfully');
    }
    public function update2($id)
    {
        Checkout::find($id)->update(array('status' => 'is Delivered'));

        return redirect('checkout')->with('msg', 'Checkout data updated successfully');
    }
}
