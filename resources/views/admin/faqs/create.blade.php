@extends('layouts.admin')
@section('title', 'Add FAQ')

@section('content')
<form class="content" method="POST" action="{{ route('admin.faqs.store') }}">
    @include('admin.faqs._form')
</form>
@endsection
