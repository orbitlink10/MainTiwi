@extends('layouts.admin')
@section('title', 'Featured Apps')
@section('content')
<div class="section-head"><h2>Manage featured apps</h2><a class="button" href="{{ route('admin.modules.create') }}">Add featured app</a></div>
<table class="table">
<thead><tr><th>Name</th><th>Small Description</th><th>Status</th><th>URL</th><th></th></tr></thead>
<tbody>
@forelse($modules as $module)
    <tr>
        <td><strong>{{ $module->name }}</strong><small>{{ $module->slug }}</small></td>
        <td>{{ $module->short_description }}</td>
        <td><span class="admin-status @if($module->status) active @endif">{{ $module->status ? 'Active' : 'Inactive' }}</span></td>
        <td>{{ $module->external_url ?: 'Not set' }}</td>
        <td class="inline-actions"><a class="admin-action" href="{{ route('admin.modules.edit', $module) }}">Edit</a><form method="POST" action="{{ route('admin.modules.destroy', $module) }}">@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form></td>
    </tr>
@empty
    <tr><td colspan="5">No featured apps have been added yet.</td></tr>
@endforelse
</tbody>
</table>
<div class="pagination">{{ $modules->links() }}</div>
@endsection
