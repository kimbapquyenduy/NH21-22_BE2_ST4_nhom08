@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS product-type </h2>
    <a href="{{ route('type.add_type')}}" class="btn btn-primary float-sm-right" >Add product-type</a>
    <hr>
    <!-- {{ route('users.add')}} -->
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Type name</th>
                <th>Type img</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($typeList))
            @foreach($typeList as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->type_name}}</td>
                <td><img style="width:100px; height: 100px;" src="{{asset('images/'.$item->type_img)}}" class="card-img-top" alt="..."></td>
                <td>      
                    <a href="{{url ('edit-product_type/'.$item->id) }}" 
                    class="btn btn-warning btn-sm"> Edit </a>   
                </td>
                <td>
                <a onclick="return confirm('You definitely want to dalete ?')" 
                    href="{{ route('type.delete', ['id'=>$item->id])}}" 
                    class="btn btn-danger btn-sm"> Delete </a> 
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No product types</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection