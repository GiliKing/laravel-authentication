@extends('layout.app')


@section('content')

<div class="dropdown py-5">
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
    
@endsection