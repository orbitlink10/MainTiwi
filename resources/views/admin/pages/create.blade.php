@extends('layouts.admin')
@section('title', 'Add Page')
@section('content')
<form class="content" method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">@include('admin.pages._form')</form>
@endsection
