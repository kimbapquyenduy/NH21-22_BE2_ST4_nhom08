@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2 style="text-align: center"> EDIT PRODUCT TYPES </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Data no successfully</div>
    @endif


    <form action="{{url('update-product_type/'.$product_type->id)}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for=""> Protype name </label>
            <input type="text" class="form-control" name="type_name" placeholder="product type..." value="{{old('type_name') ?? $product_type->type_name}}"/>
            @error('type_name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Protype name </label>
            <input type="file" class="form-control" name="type_img" placeholder="product img..." value="{{old('type_img') ?? $product_type->type_img}}"/>
            @error('type_img')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add New</button>
        <a href="{{ route('type.index_type')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection