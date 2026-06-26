@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
    @include('admin.posts._form')
</form>
@endsection
