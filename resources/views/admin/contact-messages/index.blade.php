@extends('layouts.admin')
@section('title', 'Contact Messages')
@section('content')
<table class="table">
    <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Status</th><th>Received</th><th></th></tr></thead>
    <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->read_at ? 'Read' : 'Unread' }}</td>
                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                <td class="inline-actions"><a href="{{ route('admin.contact-messages.show', $message) }}">Open</a><form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}">@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">{{ $messages->links() }}</div>
@endsection
