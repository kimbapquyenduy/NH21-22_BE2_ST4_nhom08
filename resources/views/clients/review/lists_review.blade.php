@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS Manufacture </h2>
    <a href="{{ route('review.add_review')}}" class="btn btn-primary float-sm-right" >Add Manufacture</a>
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Rating</th>
                <th>user_id</th>
                <th>comment</th>
                <th>datetime</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($reviewList))
            @foreach($reviewList as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->rating}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->datetime}}</td>
                
                <td>
                    <a href="{{url ('edit-review/'.$item->id) }}" class="btn btn-warning btn-sm"> Edit </a>   
                </td>
                
                <td>
                    <a   onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('review.delete', ['id'=>$item->id])}}" 
                     class="btn btn-danger btn-sm"> Delete </a> 
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7">No manufacture</td>
            </tr>
            @endif
            
        </tbody>
    </table>
  <!-- /Main content -->
@endsection