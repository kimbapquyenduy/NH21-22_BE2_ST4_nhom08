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
                <th>Product Price</th>
                <th>Product Img</th>
                <th>Quanity</th>
                <th>User Name</th>
                <th>Status</th>
                <th width="5%"><i class="fa fa-bars" aria-hidden="true"></i></th>
                <!-- <th width="5%">Delete</th> -->
            </tr>
        </thead>
        <tbody>
            @if (!empty($checkoutList))
            @foreach($checkoutList as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{number_format($item->product_price)}}$</td>
                <td>{{$item->product_img}}</td>
                <td>{{$item->quanity}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <!-- <a href="{{url ('edit-manufacture/'.$item->id) }}" class="btn btn-warning btn-sm"> Edit </a>  -->
                    <button class="btn btn-warning btn-sm" name="button" type="button">Process</button>
                </td>
                
                <!-- <td>
                    <a   onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('manufacture.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delete </a> 
                </td> -->
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