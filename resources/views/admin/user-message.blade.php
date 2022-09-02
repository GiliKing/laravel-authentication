@extends('layout.admin-layout')


@section('content')

<div class="mt-5">
    <p class="py-3">
        All Messages from users
    </p>
    <table class="table">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date/Time</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($messages as $message)
                <tr>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->information }}</td>
                    <td>{{ $message->created_at }}</td>
                </tr>
            @empty
                <p>No Messages for you </p>
            @endforelse
        </tbody>
    </table>
</div>


@endsection