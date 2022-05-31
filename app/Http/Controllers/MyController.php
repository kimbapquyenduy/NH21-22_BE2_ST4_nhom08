<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Manufacture;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\Checkout;
use Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;


class MyController extends Controller
{
    public function __construct()
    {
        $this->wishlist = new Wishlist();
        $this->review = new Review();
    }
    function index()
    {
        $product = Product::all();

        $product_type = Product_type::all();
        $Productbs = Product::orderby('sale_amount', 'ASC')->limit(10)->get();
        $Productnew = Product::orderby('id', 'DESC')->limit(10)->get();
        return view('main', ['data' => $product, 'datatype' => $product_type, 'bs' => $Productbs, 'new' => $Productnew]);
    }
    function page($name = "/")
    {

        $product = Product::all();
        return view($name, ['data' => $product]);
    }
    function getProductById($id)
    {
        $product = Product::all();
        $productdetail = Product::where('id', $id)->get();
        // $manu = Product::where('manufacture_id', $product->manufacture_id)->get();
        return view('shop-detail', ['dat' => $productdetail, 'data' => $product]);
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


        // if ($search != "") {
        //     $product = Product::where('product_name', 'LIKE', '%' . $search . '%')->paginate(8);
        // } else {
        //     $product = Product::all();
        //     $product = Product::paginate(8);
        // }

        $search =  $request->input('key');
        if ($search != "") {
            $product = Product::where(function ($query) use ($search) {

                $query->where('product_name', 'LIKE', '%' . $search . '%');
            })
                ->paginate(6);
            $product->appends(['key' => $search]);
        } else {
            $product = Product::paginate(6);
        }


        return view('search-result', compact('product'));
    }

    public function conTact(Request $req)
    {
        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;
        $content = $req->noidung;
        Mail::send('mail.contact', compact('name', 'email', 'phone', 'content'), function ($email) use ($req) {
            $email->to('quocdang1808@gmail.com', $req->name);
            $email->from($req->email);
            $email->subject('Hello');
        });
    }

    public function conTactNewProduct(Request $req)
    {
        $email = $req->email;
        Mail::send('mail.productnew', compact('email'), function ($email) use ($req) {
            $email->to($req->email, 'a');
            $email->subject('Hello');
        });
    }

    
    
    function del_comment($id)
    {
        $review = new Review();
        $product = Product::findOrFail($id);
        $deleteStatus = $this->review->deleteCM($id);
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment = $request->comment_content;
        $comment_name = $request->comment_name;
        $rating = $request->rating;
        if( 0 < $rating && $rating > 5 ){
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $comm = new Review();
        $comm->comment = $comment;
        $comm->comment_name = $comment_name;
        $comm->comment_product_id = $product_id;
        $comm->rating = $rating;
        $comm->save();
        }
    }

    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $review = Review::where('comment_product_id',$product_id)->get();
        $output = '';
        foreach($review as $key => $comm){
            $output.= '

            <div class="row style_comment">
            <input type="hidden" name="id" class="comment_id" value="'.$comm->comment_id.'">
            <div class="col-md-2">
                <img width="80%" height="80%" src="'.url('/images/avt.jpg').'" alt="">
            </div>
            <div class="col-md-9">
            <p style="color:green">@'.$comm->comment_name .'></p>
            <p style="color:black">'.$comm->rating.'&#9733
            </p>    
            <p style="color:black">'.$comm->comment.'</p></div>
        </div>

            ';
        }
        echo $output;
    } 

    
    function Addwl($id)
    {

        $wl = Wishlist::where('user_id', Auth::id())->get();
        $wishlist = new Wishlist();
        $product = Product::findOrFail($id);
        foreach($wl as $wish){
            if($wish->product_name == $product->product_name){
                echo "1";
            }
            else{
                $userid = Auth::id();
        $dataInsert = [
            $userid,
            $product->product_name,
            $product->product_img,
            $product->product_price,
            $product->stock,
            date('Y-m-d H:i:s'),
        ];

        $wishlist->addWL($dataInsert);
            }
        }
    }

    function Loadwishlist()
    {
        $data = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist', ['data' => $data]);
    }
    function Deletewl($id)
    {

        $wishlist = new Wishlist();

        $deleteStatus = $this->wishlist->deleteWL($id);



        $data = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist', ['data' => $data]);
    }

    function AddCart($id)
    {

        $product = Product::findOrFail($id);
        Cart::add($product->id, $product->product_name, $product->product_price, 1, ['img' => $product->product_img]);
        $cart = Cart::getContent();
        return view('cartitem');
    }

    function DeleteCart($id)
    {
        Cart::remove($id);


        return view('cartitem');
    }
    function DeleteListCart($id)
    {
        Cart::remove($id);
        return view('listcart');
    }
    function Placeorder()
    {
        $order = new Checkout();
        $userid = Auth::id();
        foreach (Cart::getContent() as $item) {
            $dataInsert = [
                $item->name,
                $item->price,
                $item['attributes']->img,
                "Unprocess",
                $item->quantity,
                $userid,
                date('Y-m-d H:i:s'),
            ];
            $order->addOder($dataInsert);
        }



        Cart::clear();

        return view('cart');
    }

    function LoadOrder()
    {
        $data = Checkout::where('user_id', Auth::id())->get();
        return view('order', ['data' => $data]);
    }

    function UpdateListCart($id, $newquan)
    {
        Cart::update($id,  array(
            'quantity' => array(
                'relative' => false,
                'value' => $newquan
            ),
        ));

        return view('listcart');
    }
    function Gallery()
    {
        $Product = Product::all();
        $manu = Manufacture::all();
        $type = Product_type::all();

        return view('shop', ['product' => $Product, 'manu' => $manu, 'type' => $type]);
    }

    function ShowAllProduct()
    {
        $Product = Product::all();
        return view('shopcontent', compact("Product"));
    }
    function ShowFeatureProduct()
    {
        $Product = Product::where('product_feature', 1)->get();
        return view('shopcontent', compact("Product"));
    }
    function ShowProductPriceHighToLow()
    {
        $Product = Product::orderby('product_price', 'ASC')->get();

        return view('shopcontent', compact("Product"));
    }
    function ShowProductPriceLowToHigh()
    {
        $Product = Product::orderby('product_price', 'DESC')->get();

        return view('shopcontent', compact("Product"));
    }
    function ShowProductBestSelling()
    {
        $Product = Product::orderby('sale_amount', 'ASC')->limit(5)->get();

        return view('shopcontent', compact("Product"));
    }
    function ShowProductByManu($id)
    {
        $Product = Product::where('manufacture_id', $id)->get();
        return view('shopcontent', compact("Product"));
    }
    function ShowProductByType($id)
    {
        $Product = Product::where('type_id', $id)->get();
        return view('shopcontent', compact("Product"));
    }


    // function getProductByTypeID($id)
    // {
    //     $product = Product::where('type_id', $id)->get();
    //     return view('producttype', ['productType' => $product]);
    // }
}
