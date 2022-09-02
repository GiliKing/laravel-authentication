@extends('layout.app')


@section('content')


<div class="mb-5">
    <p class="py-5 text-center">Edit task</p>
    <form 
        @if(auth()->user()->email === 'admin@gmail.com')
            action="\admin\{{ $task->id }}"
        @else
            action="\user\{{ $task->id }}"
        @endif
        
        method="POST"
    >
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <div class="mb-2">
            Previous title: {{ $task->title }}
            </div>
          <input type="text" class="form-control" name="title" id="title">
        </div>
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror

       <div class="form-group">
            <label for="category">Category</label>
            <div class="mb-2">Previous category: {{ $task->category }}</div>
            <select name="category" class="custom-select" id="category">
                <option value="">Select A Category</option>
                @forelse ($categories as $category )
                    <option value="{{ $category->category }}"> {{ $category->category }}</option>
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
            <div class="mb-2">
                Previous deadline: {{ $task->deadline }}
            </div>
            <input type="date" class="form-control" name="deadline" id="deadline">
        </div>
        @error('deadline')
            <p class="text-danger">{{$message}}</p>
        @enderror


        <div class="form-group">
            <label for="status">Status</label>
            <div class="mb-2">Previous status: {{ $task->status }}</div>
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