@extends('layout.app')


@section('content')

    <div class="mt-5">
        <p class="py-3">
            All Your Messages
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
                    @if ($message->email === auth()->user()->email)
                        <tr>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->information }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endif
                @empty
                    <p>No Message from you </p>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection