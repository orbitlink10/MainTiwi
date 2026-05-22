@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">{{ optional($post->published_at)->format('M d, Y') }}</p>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->excerpt }}</p>
    </div>
</section>
<section class="section">
    <div class="container content">
        @if($post->featured_image)<img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}">@endif
        {!! nl2br(e($post->content)) !!}
    </div>
</section>
@endsection
