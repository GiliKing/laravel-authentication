@extends('layout.admin-layout')


@section('content')

<div class="mt-5 pl-5">
    <form action="/admin/activate/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $user->email }}" aria-describedby="emailHelp" readonly>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="password" value="{{ $user->password }}" id="exampleInputPassword1">
        </div>
        <div>
            <label for="activation">Activate / Deactivate</label>
          <input type="number" class="form-control" name="activate" value="{{ $user->activate }}" id="activation" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">You can activate the user by change 0 to 1</small>
        </div>
        @error('activate')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="mt-2 btn btn-warning">Submit</button>
    </form>
</div>
    
@endsection