@extends('layouts.admin')
@section('title', 'Edit Module')
@section('content')
<form class="content" method="POST" action="{{ route('admin.modules.update', $module) }}" enctype="multipart/form-data">@method('PUT') @include('admin.modules._form')</form>
@endsection
