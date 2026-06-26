@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
    @include('admin.pages._form')
</form>
@endsection
