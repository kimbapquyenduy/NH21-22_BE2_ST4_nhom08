<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Manufacture;
use App\Models\Users;
use Illuminate\Http\Request;

class overview extends Controller
{


    private $product;
    private $product_type;
    private $manufacture;
    private $users;
    public function __construct(){
        $this->product = new Product();
        $this->product_type = new Product_type();
        $this->manufacture = new Manufacture();
        $this->users = new Users();
    }



    public function show_product(){
        $title = 'Lists products ';

        $product = new Product();
        $users = new Users();
        $productList =$this->product->count('id');
        $typeList = $this->product_type->count('id');
        $manufacturesList = $this->manufacture->count('id');
        $usersList = $this->users->count('id');
        return view('clients.overview.overvieww', compact('productList','typeList','manufacturesList','usersList'));
    }
}
