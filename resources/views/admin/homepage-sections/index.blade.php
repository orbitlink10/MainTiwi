@extends('layouts.admin')
@section('title', 'Homepage Content')
@section('content')
<section class="admin-card">
    <div class="admin-card-head">
        <div>
            <h2>Homepage Content</h2>
            <p>Edit text blocks, homepage messaging, imagery, and section order.</p>
        </div>
        <a class="button ghost" href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    </div>

    <table class="table">
        <thead><tr><th>Section</th><th>Heading</th><th>Status</th><th>Order</th><th>Action</th></tr></thead>
        <tbody>
            @forelse($sections as $section)
                <tr>
                    <td><strong>{{ $section->label }}</strong><small>{{ $section->key }}</small></td>
                    <td>{{ $section->heading }}</td>
                    <td><span class="admin-status {{ $section->status ? 'active' : '' }}">{{ $section->status ? 'Active' : 'Inactive' }}</span></td>
                    <td>{{ $section->sort_order }}</td>
                    <td><a class="admin-action" href="{{ route('admin.homepage-sections.edit', $section) }}">Edit</a></td>
                </tr>
            @empty
                <tr><td colspan="5">No homepage sections are available yet. Refresh this page to initialize the default editable sections.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $sections->links() }}</div>
</section>
@endsection
