@extends('layouts.admin')
@section('title', 'Add Featured App')
@section('hide_admin_top', true)
@section('content')
<form method="POST" action="{{ route('admin.modules.store') }}" enctype="multipart/form-data">
    <div class="post-form-panel">
        <div class="post-form-title">Add Featured App</div>
        <div class="post-form-body">
            @include('admin.modules._form')
        </div>
    </div>
</form>
@endsection
