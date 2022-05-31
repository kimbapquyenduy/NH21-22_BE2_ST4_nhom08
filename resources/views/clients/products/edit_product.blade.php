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


    <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Name..." value="{{old('product_name')?? $product->product_name}}"/>
            @error('product_name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Price </label>
            <input type="text" class="form-control" name="product_price" placeholder="Price..." value="{{old('product_price')?? $product->product_price}}"/>
            @error('product_price')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Img </label>   
            <input type="file" class="form-control" name="product_img" placeholder="Img..." value="{{old('product_img')?? $product->product_img}}"/>
            @error('product_img')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Description </label>
            <input type="text" class="form-control" name="product_description" placeholder="Description..." value="{{old('product_description')?? $product->product_description}}"/>
            @error('product_description')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Feature</label>
            
            <select id="inputStatus" class="form-control custom-select" name='product_feature' value="{{old('product_feature')?? $product->product_feature}}">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('product_feature')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for=""> Stock </label>
            <input type="text" class="form-control" name="stock" placeholder="Stock..." value="{{old('stock')?? $product->stock}}"/>
            @error('stock')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Sale Amount </label>
            <input type="text" class="form-control" name="sale_amount" placeholder="Sale_amount..." value="{{old('sale_amount')?? $product->sale_amount}}"/>
            @error('sale_amount')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for=""> Expire Date </label>
            <input type="date" id="start" name="expire_date"
                value="{{old('expire_date')?? $product->expire_date}}"
                min="2018-01-01" max="2030-12-31">
            @error('expire_date')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for=""> Manufacture name </label>
            <select id="inputStatus" class="form-control custom-select" name='manufacture_id' value="{{old('manufacture_id')}}">
                @foreach($manufacturesList as $key => $item)
                    <option value="{{$item->id}}">{{$item->manufacture_name}}</option>
                @endforeach
            </select>
            @error('manufacture_id')
            <span style="color: red;">{{$message}}</span>
            @enderror

        </div>
        <div class="mb-3">
            <label for=""> type name </label>
            
            <select id="inputStatus" class="form-control custom-select" name='type_id' value="{{old('type_id')}}">
            @foreach($typeList as $item)
                <option value="{{$item->id}}">{{$item->type_name}}</option>
                @endforeach
            </select>
            
            @error('type_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Update product</button>
        <a href="{{ route('product.index_product')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection