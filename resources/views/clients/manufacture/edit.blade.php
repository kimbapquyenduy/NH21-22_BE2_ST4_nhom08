@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2 style="text-align: center"> EDIT MANUFACTURE </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Invalid data</div>
    @endif


    <form action="{{url('update-manufacture/'.$manufacture->id)}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for=""> Manufacture Name </label>
            <input type="text" class="form-control" name="manufacture_name" placeholder="Manufacture Name..." value="{{old('manufacture_name')??$manufacture->manufacture_name}}"/>
            @error('manufacture_name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary">Update new</button>
        <a href="{{ route('manufacture.index_manufacture')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection