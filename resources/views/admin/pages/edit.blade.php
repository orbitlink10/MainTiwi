@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.pages._form')
</form>
@endsection
