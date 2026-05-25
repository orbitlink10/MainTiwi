@extends('layouts.admin')
@section('title', 'Manage Pages')
@section('content')
<form class="admin-card" method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
    <div class="admin-card-head">
        <div>
            <h2>Add New Post</h2>
            <p>Capture SEO details, page content, media, and publishing status.</p>
        </div>
    </div>
    @include('admin.pages._form')
</form>
@endsection
