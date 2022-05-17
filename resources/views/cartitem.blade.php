@if( Cart::getContent() != null)
<ul class="cart-list">

    @foreach($cart = Cart::getContent() as $item)


    <li class="cart-item">
        <a href="{{ url('shop-detail/'.$item->id)}}" class="photo"><img src="{{url('images/'.$item['attributes']->img)}}" class="cart-thumb" alt="" /></a>
        <h6><a href="{{ url('shop-detail/'.$item->id)}}">{{$item->name}} </a> <a onclick="DeleteCart('{{$item->id}}')" href="javascript:" class="fa fa-times" style="padding-left: 70px;"></a></h6>
        <p>{{$item['quantity']}}x - <span class="price"> {{number_format($item->price)}}</span> </p>

    </li>

    @endforeach
    <li class="total">
        <a href="{{url('/cart')}}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
        <span class="float-right"><strong>Total</strong>:{{ number_format($total=Cart::getTotal())}} </span>
    </li>

</ul>
<input id="badgevalue" type="hidden" value="{{Cart::getContent()->count()}}">
@endif