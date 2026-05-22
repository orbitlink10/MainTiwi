@extends('layouts.admin')
@section('title', 'Pages')
@section('content')
<div class="section-head"><h2>Manage pages</h2><a class="button" href="{{ route('admin.pages.create') }}">Add page</a></div>
<table class="table"><thead><tr><th>Title</th><th>Slug</th><th>Status</th><th></th></tr></thead><tbody>@foreach($pages as $page)<tr><td>{{ $page->title }}</td><td>{{ $page->slug }}</td><td>{{ $page->status ? 'Active' : 'Inactive' }}</td><td class="inline-actions"><a href="{{ route('admin.pages.edit', $page) }}">Edit</a><form method="POST" action="{{ route('admin.pages.destroy', $page) }}">@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form></td></tr>@endforeach</tbody></table>
<div class="pagination">{{ $pages->links() }}</div>
@endsection
