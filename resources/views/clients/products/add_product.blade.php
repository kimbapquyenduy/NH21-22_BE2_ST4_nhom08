@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2> ADD PRODUCTS </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Invalid data</div>
    @endif


    <form action="" method="POST">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Name..." value="{{old('product_name')}}"/>
            @error('product_name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Price </label>
            <input type="text" class="form-control" name="product_price" placeholder="Price..." value="{{old('product_price')}}"/>
            @error('product_price')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Img </label>   
            <input type="text" class="form-control" name="product_img" placeholder="Img..." value="{{old('product_img')}}"/>
            @error('product_img')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Description </label>
            <input type="text" class="form-control" name="product_description" placeholder="Description..." value="{{old('product_description')}}"/>
            @error('product_description')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Feature</label>
            <input type="text" class="form-control" name="product_feature" placeholder="product_feature..." value="{{old('product_feature')}}"/>
            @error('product_feature')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> product_sale_amount </label>
            <input type="text" class="form-control" name="product_sale_amount" placeholder="product_sale_amount..." value="{{old('product_sale_amount')}}"/>
            @error('product_sale_amount')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Stock </label>
            <input type="text" class="form-control" name="stock" placeholder="Stock..." value="{{old('stock')}}"/>
            @error('stock')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Sale_amount </label>
            <input type="text" class="form-control" name="sale_amount" placeholder="Sale_amount..." value="{{old('sale_amount')}}"/>
            @error('sale_amount')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Expire_date </label>
            <input type="text" class="form-control" name="expire_date" placeholder="Expire_date..." value="{{old('expire_date')}}"/>
            @error('expire_date')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Discound_id </label>
            <input type="text" class="form-control" name="discound_id" placeholder="Discound_id..." value="{{old('discound_id')}}"/>
            @error('discound_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Manufacture_id </label>
            <input type="text" class="form-control" name="manufacture_id" placeholder="manufacture_id..." value="{{old('manufacture_id')}}"/>
            @error('manufacture_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> type_id </label>
            <input type="text" class="form-control" name="type_id" placeholder="type_id..." value="{{old('type_id')}}"/>
            @error('type_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> review_id  </label>
            <input type="text" class="form-control" name="review_id" placeholder="review_id..." value="{{old('review_id')}}"/>
            @error('review_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update product</button>
        <a href="{{ route('product.index_product')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection