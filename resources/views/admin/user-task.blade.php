@extends('layout.admin-layout')


@section('content')

    <div class="mt-5">
        <p class="py-3">
            Number Of Tasks 
            {{ count($tasks) }}

            <div class="dropdown float-right mb-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Filter By
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/admin/task/all?status=done">Done</a>
                  <a class="dropdown-item" href="/admin/task/all?status=pending">Pending</a>
                  <a class="dropdown-item" href="/admin/task/all?status=overdue">Overdue</a>
                  <a class="dropdown-item" href="/admin/task/all/pag">5 Most Recent</a>
                  <a class="dropdown-item" href="/admin/task/all">All</a>
                </div>
            </div> 

        </p>
        <table class="table">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Title</th>
                <th>Category</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
                @if (empty($tasks))
                    <p>No Task Created </p>

                @else
                    
                    @for ($i = 0; $i < count($tasks); $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $tasks[$i]->name }}</td>
                            <td>{{ $tasks[$i]->title }}</td>
                            <td>{{ $tasks[$i]->category }}</td>
                            <td>{{ $tasks[$i]->deadline }}</td>
                            <td>{{ $tasks[$i]->status }}</td>
                            <td>{{ $tasks[$i]->created_at }}</td>
                            <td>
                                <a href="/admin/{{ $tasks[$i]->id }}/edit" class="btn btn-warning">Update</a>
                            </td>
                            <td>
                                <a href="/admin/{{ $tasks[$i]->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        

                        {{-- @forelse ($tasks as $task)
                            @if ($task->email === auth()->user()->email)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->category }}</td>
                                    <td>{{ $task->deadline }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <a href="/user/{{ $task->id }}/edit" class="btn btn-warning">Update</a>
                                    </td>
                                    <td>
                                        <a href="/user/{{ $task->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <p>No Task from you </p>
                        @endforelse --}}
                    @endfor
                    
                @endif  
            
            </tbody>
        </table>
    </div>

@endsection