@extends('layout.admin-layout')


@section('content')

    <div class="mt-2">
        <div class="">
            <p class="text-center">
                Registered User
            </p>

            <p>
                <div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Messages
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/user">Show Messages</a>
                  </div>
              </div> 

                <div class="dropdown float-right py-5">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      Filter By
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/admin/?activate={{ 0 }}">Pending</a>
                      <a class="dropdown-item" href="/admin/?activate={{ 1 }}">Active</a>
                      <a class="dropdown-item" href="/admin">All</a>
                    </div>
                </div>  
            </p>
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


@endsection