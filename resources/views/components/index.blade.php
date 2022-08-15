@extends('layout.app')


@section('content')
    @auth
        <div class="mt-5">
            <p class="py-2 text-success">
                You have an Active Status
            </p>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Message History
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/user/message/all">Show history</a>
                </div>
            </div>
            <div>
                <p class="py-2 text-center">Send a message to the admin</p>
                <form action="/user/message" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" name="subject" id="subject" aria-describedby="emailHelp">
                    </div>
                    @error('subject')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                      <label for="information">Message</label>
                      <textarea name="information" class="form-control" id="information"></textarea>
                    </div>
                    @error('information')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    @else
    <div class="mt-5 pl-5">
        <h1>
            Welcome to Admin Verification
        </h1>
        <p>
            Please Register and let the admin verify you or login if you have being verified.
        </p>
        <div class="mt-5">
            <a href="/register" class="btn btn-warning">Register</a>
            <a href="/login" class="btn btn-warning">Login</a>
        </div>
    </div>
    @endauth
    
@endsection