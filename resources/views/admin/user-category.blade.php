@extends('layout.admin-layout')


@section('content')

<div class="mt-5">
    <p class="py-3">
        All Categories
    </p>
    <table class="table">
        <thead>
          <tr>
            <th>Category</th>
            <th>Status</th>
            <th>Update Status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <a href="/admin/{{ $category->id }}/edit" class="btn btn-warning">Update</a>
                    </td>
                    <td>
                        <a href="/admin/{{ $category->id }}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            @empty
                <p>No Categories Created </p>
            @endforelse
        </tbody>
    </table>
</div>


@endsection