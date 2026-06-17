@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<section class="stats">
    <div class="stat"><span>Modules</span><strong>{{ $moduleCount }}</strong></div>
    <div class="stat"><span>Active</span><strong>{{ $activeModuleCount }}</strong></div>
    <div class="stat"><span>Pages</span><strong>{{ $pageCount }}</strong></div>
    <div class="stat"><span>Posts</span><strong>{{ $postCount }}</strong></div>
    <div class="stat"><span>Blog Posts</span><strong>{{ $blogPostCount }}</strong></div>
    <div class="stat"><span>Unread</span><strong>{{ $unreadMessages }}</strong></div>
</section>
<section class="section">
    <div class="section-head">
        <h2>Latest contact messages</h2>
        <a class="button secondary" href="{{ route('admin.contact-messages.index') }}">View all</a>
    </div>
    <table class="table">
        <thead><tr><th>Name</th><th>Subject</th><th>Received</th><th></th></tr></thead>
        <tbody>
            @forelse($latestMessages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->created_at->diffForHumans() }}</td>
                    <td><a href="{{ route('admin.contact-messages.show', $message) }}">Open</a></td>
                </tr>
            @empty
                <tr><td colspan="4">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection
