@extends('layouts.admin')
@section('title', 'Blog Posts')
@section('content')
<div class="section-head"><h2>Manage blog posts</h2><a class="button" href="{{ route('admin.blog-posts.create') }}">Add post</a></div>
<table class="table"><thead><tr><th>Title</th><th>Slug</th><th>Status</th><th>Published</th><th></th></tr></thead><tbody>@foreach($posts as $post)<tr><td>{{ $post->title }}</td><td>{{ $post->slug }}</td><td>{{ $post->status ? 'Active' : 'Inactive' }}</td><td>{{ optional($post->published_at)->format('Y-m-d H:i') }}</td><td class="inline-actions"><a href="{{ route('admin.blog-posts.edit', $post) }}">Edit</a><form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}">@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form></td></tr>@endforeach</tbody></table>
<div class="pagination">{{ $posts->links() }}</div>
@endsection
