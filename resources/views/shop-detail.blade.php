@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<?php
    $id = '';
?>
<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <?php
        $manu;
        ?>
        @foreach($dat as $row)
        <?php
        $manu = $row->manufacture_id;
        $id = $row->id;
        ?>
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{ asset('images/'.$row->product_img)}}" alt="First slide"> </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-01.jpg" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="1">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-02.jpg" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="2">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-03.jpg" alt="" />
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{ $row->product_name }}</h2>
                    <h5> {{ number_format($row->product_price) }} VND </h5>
                    <p class="available-stock"><span> More than {{ $row->stock }} available / <a href="#">{{ $row->sale_amount }} sold </a></span>
                    <p>
                    <h4>Short Description:</h4>
                    <p>{{ $row->product_description }}</p>

                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover" onclick="Addwishlist('{{$row->id}}')" href="javascript:"><i class="fas fa-heart"></i> Add to wishlist</a>
                            <a class="btn hvr-hover" data-fancybox-close="" onclick="Addcart('{{$row->id}}')" href="javascript:">Add to cart</a>
                        </div>
                    </div>
                    <div class="add-to-btn">
                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <br>
        <style type="text/css">
            .style_comment{
                border: 1px solid #ddd;
                border-radius:10px;
                background: #F0F0E9;
            }
        </style>
        <form action="">
            @csrf
            <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{ $id }}">
            <div id="comment_show"></div>
        </form>
        <p></p>
        <h2>Write Comment</h2>
            <form action="">
                <div class="mb-3">
                    <label for="comment_content" class="form-label">Your Name</label>
                    <input type="text" class="form-control comment_name" id="name" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="comment_content" class="form-label">Comment</label>
                    <textarea type="text" class="form-control comment_content" id="comment_content" name="comment_content" aria-describedby="emailHelp"></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control rating" id="rating" name="rating" pattern="{1,5}"
        title="Username">
                    <div id="check_rating"></div>
                </div>
                <button id="btn-comment" type="button" class="btn btn-primary send-comment">Send</button>
                <div id="nottìy_comment"></div>
            </form>
        <!-- goi y san pham -->
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Relative Products</h1>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($data as $row)
                    @if ($row->manufacture_id== $manu)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{ asset('images/'.$row->product_img)}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{ url('shop-detail/'.$row->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
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

    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-01.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-02.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-03.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-04.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-06.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-07.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-08.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-09.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
for
<!-- End Instagram Feed  -->
@endsection