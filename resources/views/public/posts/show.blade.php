@extends('layouts.public')

@section('title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">{{ $post->admin_type }}</p>
        <h1>{{ $post->admin_title }}</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @if($post->admin_image_url)
            <img src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}" style="display:block;width:100%;max-height:460px;object-fit:cover;margin-bottom:28px;border-radius:12px;">
        @endif

        @if($post->heading_2 ?? null)
            <h2>{{ $post->heading_2 }}</h2>
        @endif

        <div class="content">
            {!! $post->admin_description !!}
        </div>
    </div>
</section>
@endsection
