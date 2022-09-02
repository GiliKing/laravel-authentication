@extends('layout.admin-layout')


@section('content')

<div class="mt-5 pl-5">
    <form action="/admin/category" method="POST">
        @csrf
        <div class="form-group">
          <label for="category">New Category</label>
          <input type="text" class="form-control" name="category" id="category">
        </div>
        @error('category')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="custom-select" id="status">
                <option value="done">Done</option>
                <option value="pending">Pending</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
    
@endsection