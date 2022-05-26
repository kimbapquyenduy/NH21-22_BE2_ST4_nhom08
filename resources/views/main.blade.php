@extends('layout')
@section('content')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="images/banner-01.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="{{ url('shop') }}">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/banner-02.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="{{ url('shop') }}">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/banner-03.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="{{ url('shop') }}">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
            @foreach($datatype as $type)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('images/'.$type->type_img)}}" alt="" />
                    <a class="btn hvr-hover" href="{{ url('producttype/'.$type->id)}}">{{$type->type_name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1> ALL PRODUCT</h1>
                    <p>Fresh and ready to go!</p>
                </div>
            </div>
        </div>

        <div class="featured-products-box owl-carousel owl-theme">
            @foreach($data as $row)

            <div class="item">
                <div class="products-single fix">
                    <div class="box-img-hover">
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
                        <h4>{{$row->product_name}}</h4>
                        <h5> {{ number_format($row->product_price) }}VND</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>


    </div>
</div>
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1> NEW PRODUCT</h1>
                    <p>Fresh and ready to go!</p>
                </div>
            </div>
        </div>

        <div class="featured-products-box owl-carousel owl-theme">
            @foreach($new as $row)

            <div class="item">
                <div class="products-single fix">
                    <div class="box-img-hover">
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
                        <h4>{{$row->product_name}}</h4>
                        <h5> {{ number_format($row->product_price) }}VND</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>


    </div>
</div>
<div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="images/add-img-01.jpg" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="images/add-img-02.jpg" alt="" />
                </div>
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
                    <h1> OUR FEATRUE PRODUCT</h1>
                    <p>Special !</p>
                </div>
            </div>
        </div>

        <div class="featured-products-box owl-carousel owl-theme">
            @foreach($data as $row)
            @if ($row->product_feature==1)
            <div class="item">
                <div class="products-single fix">
                    <div class="box-img-hover">
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
                        <h4>{{$row->product_name}}</h4>
                        <h5> {{ number_format($row->product_price) }}VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>


    </div>
</div>

<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1> OUR TOP 10 BEST SELLER</h1>
                    <p>Warrning Sold Out Really Fast !</p>
                </div>
            </div>
        </div>

        <div class="featured-products-box owl-carousel owl-theme">
            @foreach($bs as $row)

            <div class="item">
                <div class="products-single fix">
                    <div class="box-img-hover">
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
                        <h4>{{$row->product_name}}</h4>
                        <h5> {{ number_format($row->product_price) }}VND</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>


    </div>
</div>
<!-- End Products  -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-01.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-02.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-03.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-04.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-05.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-06.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-07.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-08.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-09.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('images/instagram-img-05.jpg')}}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->
@endsection