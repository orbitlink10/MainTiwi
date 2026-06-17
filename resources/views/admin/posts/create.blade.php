@extends('layouts.admin')
@section('title', 'Add Post')
@section('content')
<form class="content" method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
    @include('admin.posts._form')
</form>
@endsection
