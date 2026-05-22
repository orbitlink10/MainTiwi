@extends('layouts.admin')
@section('title', 'Add Module')
@section('content')
<form class="content" method="POST" action="{{ route('admin.modules.store') }}" enctype="multipart/form-data">@include('admin.modules._form')</form>
@endsection
