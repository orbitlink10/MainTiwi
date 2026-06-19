@extends('layouts.admin')
@section('title', 'Add Featured App')
@section('content')
<form class="content" method="POST" action="{{ route('admin.modules.store') }}" enctype="multipart/form-data">@include('admin.modules._form')</form>
@endsection
