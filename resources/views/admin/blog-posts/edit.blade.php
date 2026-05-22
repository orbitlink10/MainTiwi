@extends('layouts.admin')
@section('title', 'Edit Blog Post')
@section('content')
<form class="content" method="POST" action="{{ route('admin.blog-posts.update', $post) }}" enctype="multipart/form-data">@method('PUT') @include('admin.blog-posts._form')</form>
@endsection
