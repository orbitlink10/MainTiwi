@extends('layouts.public')

@section('content')
@php
    $rawContent = trim((string) $post->admin_description);
    $hasHtml = $rawContent !== strip_tags($rawContent);
    $contentHtml = $hasHtml
        ? $rawContent
        : collect(preg_split('/\R{2,}/', $rawContent))
            ->filter(fn ($paragraph) => filled(trim($paragraph)))
            ->map(fn ($paragraph) => '<p>'.nl2br(e(trim($paragraph))).'</p>')
            ->implode('');

    $tocItems = [];
    $usedIds = [];
    $contentHtml = preg_replace_callback('/<h([23])([^>]*)>(.*?)<\/h\1>/is', function ($matches) use (&$tocItems, &$usedIds) {
        $level = $matches[1];
        $text = trim(html_entity_decode(strip_tags($matches[3])));
        $baseId = \Illuminate\Support\Str::slug($text) ?: 'section';
        $id = $baseId;
        $index = 2;

        while (in_array($id, $usedIds, true)) {
            $id = $baseId.'-'.$index;
            $index++;
        }

        $usedIds[] = $id;
        $tocItems[] = ['id' => $id, 'title' => $text, 'level' => $level];
        $attributes = preg_replace('/\s+id=(["\']).*?\1/i', '', $matches[2]);

        return '<h'.$level.$attributes.' id="'.$id.'">'.$matches[3].'</h'.$level.'>';
    }, $contentHtml);

    $summary = ($post->meta_description ?? null) ?: \Illuminate\Support\Str::limit(strip_tags($rawContent), 190);
    $shareUrl = urlencode(request()->fullUrl());
    $shareTitle = urlencode($post->admin_title);
@endphp

<style>
    .article-page, .article-page button, .article-page input { font-family:Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; letter-spacing:0; }
    .article-page { background:#fff; color:#191b23; font-size:18px; line-height:1.68; }
    .article-shell { max-width:1180px; margin:0 auto; padding:34px 20px 72px; }
    .article-grid { display:grid; grid-template-columns:minmax(0, 760px) 300px; gap:72px; align-items:start; }
    .article-title { max-width:820px; margin:0 0 18px; color:#111827; font-size:clamp(42px, 5vw, 64px); line-height:.98; font-weight:800; letter-spacing:0; }
    .article-hero { width:100%; margin:0 0 34px; border-radius:8px; overflow:hidden; background:#eef1f5; }
    .article-hero img { display:block; width:100%; aspect-ratio:16 / 9; object-fit:cover; }
    .article-summary { margin:0 0 32px; color:#343946; font-size:21px; line-height:1.55; font-weight:400; }
    .article-intro-heading { margin:0 0 22px; color:#111827; font-size:34px; line-height:1.18; font-weight:800; letter-spacing:0; }
    .article-toc { border-top:1px solid #e6e8ee; border-bottom:1px solid #e6e8ee; padding:22px 0; margin:0 0 34px; }
    .article-toc h2 { margin:0 0 14px; color:#111827; font-size:20px; line-height:28px; font-weight:800; }
    .article-toc ol { display:grid; gap:8px; margin:0; padding-left:22px; color:#111827; font-size:16px; line-height:24px; }
    .article-toc a { color:#111827; text-decoration:none; font-weight:650; }
    .article-toc a:hover { color:#ff642d; }
    .article-content { color:#242936; overflow-wrap:break-word; word-break:normal; }
    .article-content * { max-width:100%!important; box-sizing:border-box; }
    .article-content [style] { width:auto!important; max-width:100%!important; min-width:0!important; height:auto!important; min-height:0!important; float:none!important; columns:auto!important; column-count:auto!important; }
    .article-content [style*="display:flex"], .article-content [style*="display: flex"], .article-content [style*="display:grid"], .article-content [style*="display: grid"] { display:block!important; }
    .article-content h2 { margin:52px 0 18px; color:#111827; font-size:34px; line-height:1.18; font-weight:800; letter-spacing:0; scroll-margin-top:94px; }
    .article-content h3 { margin:34px 0 14px; color:#111827; font-size:25px; line-height:1.28; font-weight:800; letter-spacing:0; scroll-margin-top:94px; }
    .article-content p { margin:0 0 20px; }
    .article-content a { color:#1264d8; font-weight:650; text-decoration:underline; text-underline-offset:3px; }
    .article-content ul, .article-content ol { margin:0 0 24px; padding-left:28px; }
    .article-content li { margin-bottom:10px; padding-left:4px; }
    .article-content img { display:block; width:100%!important; height:auto!important; margin:28px 0; border:1px solid #e5e7eb; border-radius:8px; }
    .article-content blockquote { margin:28px 0; padding:22px 26px; border-left:4px solid #ff642d; background:#fff4ee; color:#20242f; font-size:19px; line-height:1.58; }
    .article-content table, .article-content tbody, .article-content thead, .article-content tfoot, .article-content tr, .article-content td, .article-content th { display:block!important; width:100%!important; height:auto!important; min-height:0!important; }
    .article-content table { margin:0 0 28px!important; border-collapse:collapse; font-size:16px; line-height:24px; }
    .article-content th, .article-content td { border:0!important; padding:0!important; vertical-align:top; }
    .article-content th { background:#f5f7fb; color:#111827; font-weight:800; }
    .article-content td:empty, .article-content th:empty, .article-content p:empty { display:none!important; }
    .article-aside { position:sticky; top:98px; }
    .aside-panel { border:1px solid #e7e9ef; border-radius:8px; padding:22px; background:#fff; box-shadow:0 10px 30px rgba(17, 24, 39, .06); }
    .aside-panel + .aside-panel { margin-top:18px; }
    .aside-panel h2 { margin:0 0 14px; color:#111827; font-size:18px; line-height:24px; font-weight:800; }
    .aside-list { display:grid; gap:10px; margin:0; padding:0; list-style:none; font-size:14px; line-height:20px; }
    .aside-list a { color:#272d39; text-decoration:none; font-weight:650; }
    .aside-list a:hover { color:#ff642d; }
    .share-row { display:flex; gap:8px; }
    .share-row a { width:38px; height:38px; display:grid; place-items:center; border:1px solid #d9dde6; border-radius:50%; color:#111827; text-decoration:none; font-size:14px; font-weight:800; }
    .article-author { display:flex; gap:18px; align-items:flex-start; margin-top:52px; padding:26px 0 0; border-top:1px solid #e6e8ee; }
    .author-avatar { flex:0 0 58px; width:58px; height:58px; border-radius:50%; display:grid; place-items:center; background:#111827; color:#fff; font-size:18px; font-weight:800; }
    .article-author h2 { margin:0 0 6px; color:#111827; font-size:20px; line-height:28px; font-weight:800; }
    .article-author p { margin:0; color:#4b5563; font-size:15px; line-height:24px; }
    .article-cta { margin:0 0 48px; padding:34px; border-radius:8px; background:#421983; color:#fff; text-align:center; }
    .article-cta h2 { margin:0 0 8px; font-size:30px; line-height:38px; font-weight:800; }
    .article-cta p { margin:0 0 20px; color:#eee9ff; font-size:17px; line-height:26px; }
    .article-cta a { display:inline-flex; align-items:center; justify-content:center; min-height:44px; padding:10px 18px; border-radius:6px; background:#ff642d; color:#fff; font-size:16px; line-height:22px; font-weight:800; text-decoration:none; }
    .article-empty { padding:22px; border:1px solid #e5e7eb; border-radius:8px; background:#f8fafc; color:#64748b; font-weight:700; }
    @media (max-width: 991.98px) {
        .article-shell { padding:24px 18px 56px; }
        .article-grid { grid-template-columns:1fr; gap:34px; }
        .article-aside { position:static; order:-1; }
        .article-title { font-size:40px; line-height:1.05; }
        .article-summary { font-size:19px; }
        .article-intro-heading, .article-content h2 { font-size:29px; }
        .article-content h3 { font-size:23px; }
    }
    @media (max-width: 575.98px) {
        .article-page { font-size:17px; line-height:1.62; }
        .article-shell { padding-left:16px; padding-right:16px; }
        .article-title { font-size:34px; }
        .article-hero img { aspect-ratio:4 / 3; }
        .article-author { flex-direction:column; }
        .article-cta { padding:26px 22px; }
    }
</style>

<section class="article-page">
    <div class="article-shell">
        <div class="article-cta">
            <h2>Business software guidance from Tiwi</h2>
            <p>Practical software pages for teams choosing, launching, and managing business systems.</p>
            <a href="{{ route('contact') }}">Talk to us</a>
        </div>

        <div class="article-grid">
            <article>
                <h1 class="article-title">{{ $post->admin_title }}</h1>

                @if($post->admin_image_url)
                    <figure class="article-hero">
                        <img src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}">
                    </figure>
                @endif

                @if($summary)
                    <p class="article-summary">{{ $summary }}</p>
                @endif

                @if($post->admin_heading2)
                    <h2 class="article-intro-heading">{{ $post->admin_heading2 }}</h2>
                @endif

                @if(count($tocItems))
                    <nav class="article-toc" aria-label="Table of contents">
                        <h2>Table of contents</h2>
                        <ol>
                            @foreach($tocItems as $item)
                                <li><a href="#{{ $item['id'] }}">{{ $item['title'] }}</a></li>
                            @endforeach
                        </ol>
                    </nav>
                @endif

                @if(trim(strip_tags($rawContent)))
                    <div class="article-content">
                        {!! $contentHtml !!}
                    </div>
                @else
                    <div class="article-empty">No content has been added for this post yet.</div>
                @endif

                <div class="article-author">
                    <span class="author-avatar" aria-hidden="true">TI</span>
                    <div>
                        <h2>Tiwi Editorial Team</h2>
                        <p>Software guides, implementation notes, and practical resources from the Tiwi team for growing businesses.</p>
                    </div>
                </div>
            </article>

            <aside class="article-aside" aria-label="Article sidebar">
                @if(count($tocItems))
                    <div class="aside-panel">
                        <h2>Table of contents</h2>
                        <ul class="aside-list">
                            @foreach($tocItems as $item)
                                <li><a href="#{{ $item['id'] }}">{{ $item['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="aside-panel">
                    <h2>Share</h2>
                    <div class="share-row">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on Facebook">f</a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on LinkedIn">in</a>
                        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&amp;text={{ $shareTitle }}" target="_blank" rel="noopener" aria-label="Share on X">x</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
