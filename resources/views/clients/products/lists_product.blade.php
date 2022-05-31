@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS product </h2>
    <a href="{{ route('product.add_product')}}" class="btn btn-primary float-sm-right" >Add product</a>
    <hr>
    <table class="table table-bordered" style="text-align: center; border-collapse;">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Name</th>
                <th>Price</th>
                <th width="15%">Img</th>
                <th width="30%">Description</th>
                <th>Feature</th>
                <th>Stock</th>
                <th>Sale Amount</th>
                <th>Expire date</th>
                <th>Manufacture Name</th>
                <th>Type Name</th>
            
                <th width="5%"><i class="fa fa-bars" aria-hidden="true"></i></th>

            </tr>
        </thead>
        <tbody>
            @if (!empty($productList))
            @foreach($productList as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{number_format($item->product_price)}}$</td>
                <td><img  src="{{asset('images/'.$item->product_img)}}" class="card-img-top" alt="..."></td>
                <td >{{ substr($item->product_description,0,30) }}</td>

                <td>{{$item->product_feature}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->sale_amount}}</td>
                <td>{{$item->expire_date}}</td>
                <td>{{$item->manufacture_name}}</td>
                <td>{{$item->type_name}}</td>
               
                <td>      
                    <a href="{{url ('edit-product/'.$item->id) }}"
                    class="btn btn-warning btn-sm"> Edit </a>   
                    <a onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('product.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delete </a> 
                </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="12">No product</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection