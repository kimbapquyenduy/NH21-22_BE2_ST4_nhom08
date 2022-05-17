@extends('footer')
@section('content')
  <!-- Main content -->
    
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h2> EDIT USERS </h2>
    @if ($errors->any())
        <div class="alect alect-danger">Data no successfully</div>
    @endif


    <form action="{{route('users.post-edit')}}" method="POST">
        <div class="mb-3">
            <label for="">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name..." value="{{old('name') ?? $userDetail->name}}"/>
            @error('name')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email..." value="{{old('email')?? $userDetail->email}}">
            @error('email')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">password</label>
            <input type="text" class="form-control" name="password" placeholder="Nhập password..." value="{{old('password')?? $userDetail->password}}"/>
            @error('password')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">role_id</label>
            <input type="text" class="form-control" name="role_id" placeholder="Là user nhập 1, Admin nhập 2..." value="{{old('role_id')?? $userDetail->role_id}}"/>
            @error('role_id')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update users</button>
        <a href="{{ route('users.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form> 
@endsection