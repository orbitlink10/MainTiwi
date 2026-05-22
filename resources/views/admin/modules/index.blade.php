@extends('layouts.admin')
@section('title', 'Modules')
@section('content')
<div class="section-head"><h2>Manage modules</h2><a class="button" href="{{ route('admin.modules.create') }}">Add module</a></div>
<table class="table">
<thead><tr><th>Name</th><th>Slug</th><th>Status</th><th>External URL</th><th></th></tr></thead>
<tbody>@foreach($modules as $module)<tr><td>{{ $module->name }}</td><td>{{ $module->slug }}</td><td>{{ $module->status ? 'Active' : 'Inactive' }}</td><td>{{ $module->external_url }}</td><td class="inline-actions"><a href="{{ route('admin.modules.edit', $module) }}">Edit</a><form method="POST" action="{{ route('admin.modules.destroy', $module) }}">@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form></td></tr>@endforeach</tbody>
</table>
<div class="pagination">{{ $modules->links() }}</div>
@endsection
