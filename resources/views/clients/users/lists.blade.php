@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS Users </h2>
    
    <a href="{{ route('users.add')}}" class="btn btn-primary float-sm-right" >Add Users</a>
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Users Name</th>
                <th>Email</th>
                <th>Password</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
            @foreach($usersList as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->password}}</td>
                <td>
                    <a href="{{url ('edit-users/'.$item->id) }}" class="btn btn-warning btn-sm"> Edit </a>   
                </td>
                
                <td>
                    <a onclick="return confirm('You definitely want to delete ?')" href="{{ route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm"> Delete </a> 
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">No users</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection