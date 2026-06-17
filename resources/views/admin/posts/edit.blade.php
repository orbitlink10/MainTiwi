@extends('layouts.admin')
@section('title', 'Edit Post')
@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts._form')
</form>
@endsection
