@extends('footer')
@section('content')
  <!-- Main content -->
    <h2 style="text-align: center"> LISTS Review </h2>
    <!-- <a href="{{ route('review.add_review')}}" class="btn btn-primary float-sm-right" >Add Review</a> -->
    <hr>
    <table class="table table-bordered" style="text-align: center">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th>Product Name</th>
                <th>Comment Name</th>
                <th>Comment</th>
                <th>Rating</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($reviewList))
            @foreach($reviewList as $item)
            <tr>
                <td>{{$item->comment_id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->comment_name}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->rating}}</td>  
                
                <td>
                    <a   onclick="return confirm('You definitely want to delete ?')" 
                    href="{{ route('review.delete', ['comment_id'=>$item->comment_id])}}" 
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