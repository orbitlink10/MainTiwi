@extends('layouts.public')

@section('content')
<style>
    .post-page-hero{padding:72px 24px 36px;background:#fff;border-bottom:1px solid #e5e7eb}
    .post-page-wrap{width:min(100% - 48px,1120px);margin:0 auto}
    .post-page-eyebrow{margin:0 0 12px;color:#f59e0b;font-size:13px;font-weight:900;letter-spacing:.12em;text-transform:uppercase}
    .post-page-title{max-width:920px;margin:0;color:#071225;font-size:48px;line-height:1.08;font-weight:900;letter-spacing:-.04em}
    .post-page-section{padding:54px 24px 86px;background:#fff}
    .post-page-image{display:block;width:100%;max-height:480px;object-fit:cover;margin:0 0 34px;border-radius:10px;border:1px solid #e5e7eb;background:#f8fafc}
    .post-page-heading{margin:0 0 18px;color:#071225;font-size:32px;line-height:1.2;font-weight:850}
    .post-page-content{max-width:920px;color:#263548;font-size:18px;line-height:1.8}
    .post-page-content p{margin:0 0 18px}
    .post-page-content h2,.post-page-content h3{margin:30px 0 14px;color:#071225;line-height:1.2}
    .post-page-content ul,.post-page-content ol{padding-left:24px;margin:0 0 18px}
    .post-page-empty{padding:22px;border:1px solid #e5e7eb;border-radius:10px;background:#f8fafc;color:#64748b;font-weight:700}
    @media(max-width:700px){.post-page-title{font-size:34px}.post-page-wrap{width:min(100% - 32px,1120px)}.post-page-hero,.post-page-section{padding-left:16px;padding-right:16px}}
</style>

<section class="post-page-hero">
    <div class="post-page-wrap">
        <p class="post-page-eyebrow">{{ $post->admin_type }}</p>
        <h1 class="post-page-title">{{ $post->admin_title }}</h1>
    </div>
</section>

<section class="post-page-section">
    <div class="post-page-wrap">
        @if($post->admin_image_url)
            <img class="post-page-image" src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}">
        @endif

        @if($post->admin_heading2)
            <h2 class="post-page-heading">{{ $post->admin_heading2 }}</h2>
        @endif

        @if(trim(strip_tags($post->admin_description)))
            <article class="post-page-content">
                {!! $post->admin_description !!}
            </article>
        @else
            <div class="post-page-empty">No content has been added for this post yet.</div>
        @endif
    </div>
</section>
@endsection
