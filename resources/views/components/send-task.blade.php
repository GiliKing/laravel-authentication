@extends('layout.app')


@section('content')


<div>
    <p class="py-5 text-center">Create A task</p>
    <form action="/user/task" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title">
        </div>
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror

       <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="custom-select" id="category">
                <option value="">Select A Category</option>
                @forelse ($categories as $category )
                    @if (empty($category))
                        <option value="No Category Assigned">No Category Active</option>
                    @endif
                    @if($category->status !== "done")
                        <option value="{{ $category->category }}"> {{ $category->category }}</option>
                    @endif
                @empty
                    <option value="no avialable category">No Available Category</option>
                @endforelse
                
            </select>
       </div>
        @error('category')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" name="deadline" id="deadline">
        </div>
        @error('deadline')
            <p class="text-danger">{{$message}}</p>
        @enderror


        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="custom-select" id="status">
                <option value="">Select A Status</option>
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