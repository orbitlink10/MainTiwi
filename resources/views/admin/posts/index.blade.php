@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<form method="POST" action="{{ route('admin.posts.bulk-action') }}" onsubmit="return confirm('Apply this action to the selected posts?')">
    @csrf
    <div class="bulk-bar">
        <select name="action" aria-label="Bulk actions">
            <option value="">Bulk actions</option>
            <option value="delete">Delete selected</option>
        </select>
        <button class="button" type="submit">Apply</button>
        <a class="button ghost" href="{{ route('admin.posts.create') }}">Add post</a>
    </div>

    <section class="section">
        <table class="table content-table">
            <thead>
                <tr>
                    <th class="check-col"><input type="checkbox" aria-label="Select all posts" onclick="document.querySelectorAll('.post-check').forEach((checkbox) => checkbox.checked = this.checked)"></th>
                    <th class="no-col">No.</th>
                    <th class="image-col">Image</th>
                    <th>Title</th>
                    <th>Alt Text</th>
                    <th class="type-col">Type</th>
                    <th class="action-col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td><input class="post-check" type="checkbox" name="posts[]" value="{{ $post->id }}" aria-label="Select {{ $post->admin_title }}"></td>
                        <td>{{ $posts->firstItem() + $loop->index }}</td>
                        <td>
                            @if($post->admin_image_url)
                                <img class="post-thumb" src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}">
                            @else
                                <span class="post-thumb post-thumb-empty">No image</span>
                            @endif
                        </td>
                        <td><span class="post-title">{{ $post->admin_title }}</span></td>
                        <td>{{ $post->admin_alt_text }}</td>
                        <td>{{ $post->admin_type }}</td>
                        <td>
                            <div class="post-actions">
                                <a class="admin-action preview" href="{{ route('admin.posts.show', $post) }}">Preview</a>
                                <a class="admin-action" href="{{ route('admin.posts.edit', $post) }}">Update</a>
                                <button class="danger" type="submit" form="delete-post-{{ $post->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $posts->links() }}</div>
    </section>
</form>

@foreach($posts as $post)
    <form id="delete-post-{{ $post->id }}" method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
        @csrf
        @method('DELETE')
    </form>
@endforeach
@endsection
