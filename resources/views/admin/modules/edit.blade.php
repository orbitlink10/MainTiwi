@extends('layouts.admin')
@section('title', 'Edit Featured App')
@section('hide_admin_top', true)
@section('content')
<form method="POST" action="{{ route('admin.modules.update', $module) }}" enctype="multipart/form-data">
    @method('PUT')
    <div class="post-form-panel">
        <div class="post-form-title">Edit Featured App</div>
        <div class="post-form-body">
            @include('admin.modules._form')
        </div>
    </div>
</form>
@endsection
