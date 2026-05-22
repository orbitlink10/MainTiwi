@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
<div class="section-head"><h2>Homepage content</h2></div>
<table class="table">
    <thead><tr><th>Section</th><th>Heading</th><th>Status</th><th>Order</th><th></th></tr></thead>
    <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->label }}</td>
                <td>{{ $section->heading }}</td>
                <td>{{ $section->status ? 'Active' : 'Inactive' }}</td>
                <td>{{ $section->sort_order }}</td>
                <td><a href="{{ route('admin.homepage-sections.edit', $section) }}">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">{{ $sections->links() }}</div>
@endsection
