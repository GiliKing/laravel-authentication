@extends('layout.app')


@section('content')

<div class="mt-5 pl-5">
    <form action="/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
        </div>
        @error('phone')
            <p class="text-danger">{{$message}}</p>
        @enderror
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
        <div class="form-group">
            <label for="password_confirmation">Password Again</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
        @error('password_confirmation')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
    
@endsection