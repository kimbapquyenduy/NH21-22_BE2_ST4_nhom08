@extends('layout')
@section('content')

@if (Auth::check())

@else
<script>
    window.location.replace("login");
</script>
@endif

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">YOUR ORDER</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="listcart">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quanity</th>
                                <th>Ordering Time</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach($data as $item)
                            <tr class="cart-item" style="text-align: center;">
                                <td class="thumbnail-img">
                                    <a href="{{ url('shop-detail/'.$item->id)}}">
                                        <img class="img-fluid" src="{{url('images/'.$item->product_img)}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{ url('shop-detail/'.$item->id)}}">
                                        {{$item->product_name}}
                                    </a>
                                </td>
                                <td class="Quanity-pr">
                                    <p>{{number_format($item->product_price)}}</p>
                                </td>
                                <td class="price-pr">
                                    <p>{{$item->quanity}}</p>
                                </td>
                                <td class="price-pr">
                                    <p>{{$item->created_at}}</p>
                                </td>
                                <td class="price-pr">
                                    <p>{{$item->status}}</p>
                                </td>


                            </tr>
                            @endforeach



                        </tbody>
                    </table>
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
<!-- End Instagram Feed  -->


@endsection