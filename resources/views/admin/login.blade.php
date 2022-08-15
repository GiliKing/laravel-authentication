@extends('layout.admin-layout')


@section('content')

<div class="mt-5 pl-5">
    <form action="/admin/authenticate" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
    
@endsection