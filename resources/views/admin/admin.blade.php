@extends('layout.admin-layout')


@section('content')

    <div class="mt-4">
        <div class="border shadow-lg px-5 mt-5">
          <p class="text-center mt-5">
            Total Numer Of Registered Users: <i>{{ count($users) }}</i>
          </p>
          <div class="dropdown float-right mb-2">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Filter By
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/admin/?activate={{ 0 }}">Pending</a>
              <a class="dropdown-item" href="/admin/?activate={{ 1 }}">Active</a>
              <a class="dropdown-item" href="/admin/pag">5 most recent Users</a>
              <a class="dropdown-item" href="/admin">All</a>
            </div>
          </div>  
          <table class="table">
              <thead>
                <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>password</th>
                  <th>Status</th>
                  <th>Activate</th>
                </tr>
              </thead>
              <tbody>

                  @unless(count($users) == 0)

                  @foreach($users as $user)

                  <x-user-data :user="$user" />

                  @endforeach


                  @else
                  <p>No User found</p>
                  @endunless

              </tbody>
          </table>
        </div>

        <div class="mt-5">
          <p>
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Create A Category / Or View Messages / Or View Tasks / Or View Categories
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin/newcategory">Creat A Category</a>
                <a class="dropdown-item" href="/admin/user">View Messages</a>
                <a class="dropdown-item" href="/admin/task/all">View Tasks</a>
                <a class="dropdown-item" href="/admin/category/all">View Categories</a>
              </div>
            </div> 
          </p>
        </div>
    </div>


@endsection