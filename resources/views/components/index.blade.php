@extends('layout.app')


@section('content')
    @auth
        <x-user-welcome />
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