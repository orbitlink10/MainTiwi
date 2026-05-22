@extends('layouts.admin')
@section('title', 'Add Blog Post')
@section('content')
<form class="content" method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data">@include('admin.blog-posts._form')</form>
@endsection
