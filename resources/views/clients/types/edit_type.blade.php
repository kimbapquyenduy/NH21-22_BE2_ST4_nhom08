@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2>EDIT PRODUCT TYPES </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Data no successfully</div>
    @endif


    <form action="{{route('type.post-edit_type')}}" method="POST">
        <div class="mb-3">
            <label for="">Product type</label>
            <input type="text" class="form-control" name="type_name" placeholder="Product type..." value="{{old('type_name') ?? $typeDetail->type_name}}"/>
            @error('type_name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update New</button>
        <a href="{{ route('type.index_type')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection