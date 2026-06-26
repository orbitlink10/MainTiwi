@extends('layouts.admin')
@section('title', 'Pages')
@section('content')
<form method="POST" action="{{ route('admin.pages.bulk-action') }}" onsubmit="return confirm('Apply this action to the selected pages?')">
    @csrf
    <section class="admin-card">
        <div class="admin-card-head">
            <div>
                <h2>Post List</h2>
                <p>Manage published pages, preview changes, and update content.</p>
            </div>
            <a class="button" href="{{ route('admin.pages.create') }}">+ Add Page</a>
        </div>

        <div class="bulk-bar">
            <select name="action" aria-label="Bulk actions">
                <option value="">Bulk actions</option>
                <option value="delete">Delete selected</option>
            </select>
            <button class="button" type="submit">Apply</button>
        </div>

        <table class="table content-table">
            <thead>
                <tr>
                    <th class="check-col"><input type="checkbox" aria-label="Select all pages" onclick="document.querySelectorAll('.page-check').forEach((checkbox) => checkbox.checked = this.checked)"></th>
                    <th class="no-col">No.</th>
                    <th class="image-col">Image</th>
                    <th>Title</th>
                    <th>Alt Text</th>
                    <th class="type-col">Type</th>
                    <th class="action-col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td><input class="page-check" type="checkbox" name="pages[]" value="{{ $page->id }}" aria-label="Select {{ $page->title }}"></td>
                        <td>{{ $pages->firstItem() + $loop->index }}</td>
                        <td>
                            @if($page->admin_image_url)
                                <img class="post-thumb" src="{{ $page->admin_image_url }}" alt="{{ $page->admin_alt_text }}">
                            @else
                                <span class="post-thumb post-thumb-empty">No image</span>
                            @endif
                        </td>
                        <td><span class="post-title">{{ $page->title }}</span></td>
                        <td>{{ $page->admin_alt_text }}</td>
                        <td>{{ $page->admin_type }}</td>
                        <td>
                            <div class="post-actions">
                                <a class="admin-action preview" href="{{ $page->public_url }}" target="_blank" rel="noopener">Preview</a>
                                <a class="admin-action" href="{{ route('admin.pages.edit', $page) }}">Update</a>
                                <button class="danger" type="submit" form="delete-page-{{ $page->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">No pages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $pages->onEachSide(1)->links('admin.partials.pagination') }}</div>
    </section>
</form>

@foreach($pages as $page)
    <form id="delete-page-{{ $page->id }}" method="POST" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Delete this page?')">
        @csrf
        @method('DELETE')
    </form>
@endforeach
@endsection
