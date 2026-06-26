@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts._form')
</form>
@endsection
