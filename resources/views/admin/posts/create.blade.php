@extends('layouts.admin')
@section('title', 'Add Post')
@section('hide_admin_top', true)
@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
    @include('admin.posts._form')
</form>
@endsection
