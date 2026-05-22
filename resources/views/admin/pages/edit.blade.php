@extends('layouts.admin')
@section('title', 'Edit Page')
@section('content')
<form class="content" method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">@method('PUT') @include('admin.pages._form')</form>
@endsection
