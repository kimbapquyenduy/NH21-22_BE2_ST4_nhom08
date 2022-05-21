@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS product </h2>
    <a href="{{ route('product.add_product')}}" class="btn btn-primary float-sm-right" >Add product</a>
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Name</th>
                <th>Price</th>
                <th width="20%">Img</th>
                <th width="30%">Description</th>
                <th>Feature</th>
                <th>product_sale_amount</th>
                <th>Stock</th>
                <th>Sale_amount</th>
                <th>Expire_date</th>
                <th>Discound_id</th>
                <th>Manufacture_id</th>
                <th>type_id</th>
                <th>Review_id</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($productList))
            @foreach($productList as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_price}}</td>
                <td><img src="{{asset('images/'.$item->product_img)}}" class="card-img-top" alt="..."></td>
                <td>{{$item->product_description}}</td>
                <td>{{$item->product_feature}}</td>
                <td>{{$item->product_sale_amount}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->sale_amount}}</td>
                <td>{{$item->expire_date}}</td>
                <td>{{$item->discound_name}}</td>
                <td>{{$item->manufacture_name}}</td>
                <td>{{$item->type_name}}</td>
                <td>{{$item->review_name}}</td>
                <td>      
                    <a href="#"
                    class="btn btn-warning btn-sm"> Edit </a>   
                </td>
                <td>
                    <a onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('product.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delete </a> 
                    
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="15">No product</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection