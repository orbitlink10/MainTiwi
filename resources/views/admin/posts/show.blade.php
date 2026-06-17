@extends('layouts.admin')
@section('title', 'Preview Post')
@section('content')
<section class="section">
    <div class="section-head">
        <div>
            <h2>{{ $post->admin_title }}</h2>
            <p>{{ $post->admin_type }}</p>
        </div>
        <a class="button" href="{{ route('admin.posts.edit', $post) }}">Update</a>
    </div>
    <div class="admin-form-section">
        @if($post->admin_image_url)
            <img src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}" style="display:block;width:min(100%,720px);max-height:360px;object-fit:cover;margin-bottom:22px;border:1px solid #dce7f4;">
        @endif
        <p><strong>Alt text:</strong> {{ $post->admin_alt_text }}</p>
        <div>{!! $post->admin_description !!}</div>
    </div>
    <div class="actions">
        <a class="button ghost" href="{{ route('admin.posts.index') }}">Back to posts</a>
    </div>
</section>
@endsection
