@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2 style="text-align: center"> EDIT REVIEW </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Invalid data</div>
    @endif


    <form action="{{url('update-review/'.$review->id)}}" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="">User_id </label>            
            <select id="inputStatus" class="form-control custom-select" name='user_id' value="{{old('user_id')??$review->user_id}}">
                @foreach($usersList as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            
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
            <input type="date" id="start" name="datetime"
                value="{{old('datetime')??$review->datetime}}"
                min="2018-01-01" max="2030-12-31">
            
            @error('datetime')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update new</button>
        <a href="{{ route('review.index_review')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection