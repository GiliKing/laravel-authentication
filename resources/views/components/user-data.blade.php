
@props(['user'])

<tr>
    <td>
        {{ $user->name }}
    </td>
    <td>
        {{ $user->phone }}
    </td>
    <td>
        {{ $user->email }}
    </td>
    <td>
        @if ($user->activate == 0)
            {{ "pending" }}
        @else
            {{ "active" }}
        @endif
    </td>
    <td>
        @if ($user->activate == 0)
           <a href="/admin/{{ $user->id }}/activate" class="btn btn-warning">Activate</a>
        @else
            <a href="/admin/{{ $user->id }}/activate" class="btn btn-success">Deactivate</a>
        @endif
    </td>
</tr>