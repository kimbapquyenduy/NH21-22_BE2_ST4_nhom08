@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Product Types</h2>
            </div>
        </div>
    </div>
</div>
<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Fruits & Vegetables</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>


        <div class="row special-list">
            @foreach($productType as $row)
            <div class="col-lg-3 col-md-6 special-grid @{{ $row->product_name==1 ? echo best-seller : echo 0 }}">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                          
                        </div>
                        <img src="{{ asset('images/'.$row->product_img)}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="{{ url('shop-detail/'.$row->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a onclick="Addwishlist('{{$row->id}}')" href="javascript:" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" onclick="Addcart('{{$row->id}}')" href="javascript:">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>{{ $row->product_name }}</h4>
                        <h5> {{ number_format($row->product_price) }} VND</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Products  -->
@endsection