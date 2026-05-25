@extends('layouts.admin')
@section('title', 'Pages')
@section('content')
<section class="admin-card">
    <div class="admin-card-head">
        <div>
            <h2>Post List</h2>
            <p>Manage published pages, preview changes, and update content.</p>
        </div>
        <a class="button" href="{{ route('admin.pages.create') }}">+ Add Page</a>
    </div>

    <table class="table">
        <thead>
            <tr><th>No.</th><th>Title</th><th>Alt Text</th><th>Type</th><th>Status</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $loop->iteration + ($pages->currentPage() - 1) * $pages->perPage() }}</td>
                    <td>
                        <strong>{{ $page->title }}</strong>
                        <small>URL: /{{ $page->slug }}</small>
                    </td>
                    <td>{{ $page->image_alt_text ?: 'Not set' }}</td>
                    <td>{{ $page->type ?: 'Post' }}</td>
                    <td><span class="admin-status {{ $page->status ? 'active' : '' }}">{{ $page->status ? 'Active' : 'Inactive' }}</span></td>
                    <td class="inline-actions">
                        <a class="admin-action" href="{{ route('admin.pages.edit', $page) }}">Update</a>
                        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}">
                            @csrf @method('DELETE')
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{ $pages->links() }}</div>
</section>
@endsection
