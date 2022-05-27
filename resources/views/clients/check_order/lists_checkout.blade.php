@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS ORDER </h2>
    
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Product Name</th>
                <th>Quanity</th>
                <th width="15%">Product Img</th>
                <th>Product Price</th>
                <th>User Name</th>
                <th>Status</th>
                <th width="5%"><i class="fa fa-bars" aria-hidden="true"></i></th>
                <th width="5%"><i class="fa fa-bars" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($checkoutList))
            @foreach($checkoutList as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->quanity}}</td>
                <td><img style="width:100px; height: 100px;" src="{{asset('images/'.$item->product_img)}}" class="card-img-top" alt="..."></td>
                <td>{{number_format($item->product_price)}}$</td>
                <td id="gi">{{$item->name}}</td>
                <td>{{$item->status}}</td>
                <td>
                   <button href="{{url ('update-checkout/'.$item->id) }}"  class="btn btn-warning btn-sm" name="button" type="button">Process</button>
                   
                </td>
                <td>
                <a href="{{ route('checkout.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delivered </a> 
                </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No manufacture</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection