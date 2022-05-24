@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2> ADD MANUFACTURE </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Invalid data</div>
    @endif


    <form action="{{url('update-review/'.$review->id)}}" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="">Rating </label>
            <input type="text" class="form-control" name="rating" placeholder="ratting..." value="{{old('rating')??$review->rating}}"/>
            @error('rating')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">User_id </label>
            <input type="text" class="form-control" name="user_id" placeholder="user_id..." value="{{old('user_id')??$review->user_id}}"/>
            @error('user_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Comment </label>
            <input type="text" class="form-control" name="comment" placeholder="comment..." value="{{old('comment')??$review->comment}}"/>
            @error('comment')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Datetime </label>
            <input type="text" class="form-control" name="datetime" placeholder="datetime for form yyyy/mm/dd..." value="{{old('datetime')??$review->datetime}}"/>
            @error('datetime')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update new</button>
        <a href="{{ route('review.index_review')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection