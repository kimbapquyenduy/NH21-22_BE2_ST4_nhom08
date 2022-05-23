@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS Manufacture </h2>
    <a href="{{ route('manufacture.add_manufacture')}}" class="btn btn-primary float-sm-right" >Add Manufacture</a>
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Manufacture Name</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($manufacturesList))
            @foreach($manufacturesList as $key => $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->manufacture_name}}</td>
                <td>
                    <a href="{{url ('edit-manufacture/'.$item->id) }}" class="btn btn-warning btn-sm"> Edit </a>   
                </td>
                
                <td>
                    <a   onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('manufacture.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delete </a> 
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