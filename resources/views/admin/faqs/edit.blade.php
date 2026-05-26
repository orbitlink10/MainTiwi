@extends('layouts.admin')
@section('title', 'Edit FAQ')

@section('content')
<form class="content" method="POST" action="{{ route('admin.faqs.update', $faq) }}">
    @method('PUT')
    @include('admin.faqs._form')
</form>
@endsection
