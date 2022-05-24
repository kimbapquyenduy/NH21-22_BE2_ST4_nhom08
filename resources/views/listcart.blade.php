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
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Save</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if( Cart::getContent() != null)
                            @foreach($cart = Cart::getContent() as $item)
                            <tr class="cart-item" style="text-align: center;">
                                <td class="thumbnail-img">
                                    <a href="{{ url('shop-detail/'.$item->id)}}">
                                        <img class="img-fluid" src="{{url('images/'.$item['attributes']->img)}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{ url('shop-detail/'.$item->id)}}">
                                        {{$item->name}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{number_format($item->price)}}</p>
                                </td>
                                <td class="quantity-box"><input id="quantity{{$item->id}}" type="number" size="4" value="{{$item['quantity']}}" min="1" step="1" class="c-input-text qty text"></td>
                                <td class="total-pr">
                                    <p>{{number_format($item->price*$item->quantity)}}</p>
                                </td>
                                <td class="update-pr">
                                    <a data-id="{{$item->id}}" id="save-item-{{$item->id}}" onclick="UpdateListCart('{{$item->id}}')" href="javascript:">
                                        <i class="fas fa-save"></i>
                                    </a>
                                </td>
                                <td class="remove-pr">
                                    <a onclick="DeleteListCart('{{$item->id}}')" href="javascript:">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <h2>Is Empty</h2>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> {{ number_format($total=Cart::getTotal())}} </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="{{url('checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>

    </div>
</div>