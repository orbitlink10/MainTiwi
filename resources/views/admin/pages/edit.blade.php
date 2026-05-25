@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form class="admin-card" method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
    @method('PUT')
    <div class="admin-card-head">
        <div>
            <h2>Update Post</h2>
            <p>Update SEO details, page content, media, and publishing status.</p>
        </div>
    </div>
    @include('admin.pages._form')
</form>
@endsection
