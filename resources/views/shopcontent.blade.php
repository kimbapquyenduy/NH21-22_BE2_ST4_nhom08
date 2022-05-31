<div class="product-categorie-box">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
            <div class="row">
                @foreach($Product as $row)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">

                            </div>
                            <img src="{{ asset('images/'.$row->product_img)}}" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{ url('shop-detail/'.$row->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                    <li><a  onclick="Addwishlist('{{$row->id}}')" href="javascript:" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" onclick="Addcart('{{$row->id}}')" href="javascript:">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{ $row->product_name }}</h4>
                            <h5> {{ number_format($row->product_price) }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="list-view">
            @foreach($Product as $row)
            <div class="list-view-box">
                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
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

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                        <div class="why-text full-width">
                            <h4>{{ $row->product_name }}</h4>
                            <h5> {{ number_format($row->product_price) }}</h5>
                            <p>{{ $row->product_description }}</p>
                            <a class="btn hvr-hover" onclick="Addcart('{{$row->id}}')" href="javascript:">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>