@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<section class="section">
    <div class="section-head">
        <h2>Manage posts</h2>
        <a class="button" href="{{ route('admin.posts.create') }}">Add post</a>
    </div>
    <table class="table">
        <thead>
            <tr><th>Title</th><th>Slug</th><th>Status</th><th>Published</th><th></th></tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->status ? 'Active' : 'Inactive' }}</td>
                    <td>{{ optional($post->published_at)->format('Y-m-d H:i') }}</td>
                    <td class="inline-actions">
                        <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No posts yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $posts->links() }}</div>
</section>
@endsection
