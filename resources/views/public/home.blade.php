@extends('layouts.public')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Tiwi Software Hub</p>
            <h1>{{ $sections['hero']->heading ?? 'Business software modules connected through one Tiwi hub' }}</h1>
            <p>{{ $sections['hero']->body ?? 'Market, manage, and link to specialist systems from one Laravel website.' }}</p>
            <div class="actions">
                <a class="button" href="{{ route('modules.index') }}">Explore modules</a>
                <a class="button secondary" href="{{ route('contact') }}">Contact us</a>
            </div>
        </div>
        <div class="hero-panel">
            <p class="eyebrow">Active Modules</p>
            <div class="module-stack">
                @foreach($modules as $module)
                    <a class="mini-module" href="{{ route('modules.show', $module) }}">
                        <strong>{{ $module->name }}</strong>
                        <span>View</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section white">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Solutions</p>
                <h2>Software modules for daily operations</h2>
            </div>
            <a class="button ghost" href="{{ route('modules.index') }}">All modules</a>
        </div>
        <div class="grid">
            @foreach($modules as $module)
                <article class="card">
                    <h3>{{ $module->name }}</h3>
                    <p>{{ $module->short_description }}</p>
                    <a class="button secondary" href="{{ route('modules.show', $module) }}">Learn more</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container grid">
        <div>
            <p class="eyebrow">Why Choose Tiwi</p>
            <h2>{{ $sections['why']->heading ?? 'One brand gateway for many operational tools' }}</h2>
            <p>{{ $sections['why']->body ?? 'Manage pages, modules, SEO content, and enquiries from one dashboard.' }}</p>
        </div>
        @foreach(($sections['why']->payload['points'] ?? ['Centralized module marketing', 'Clean external links', 'SEO-ready content']) as $point)
            <div class="card"><h3>{{ $point }}</h3><p>Built to keep the Tiwi website clear, searchable, and easy to expand.</p></div>
        @endforeach
    </div>
</section>

<section class="section white">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">News</p>
                <h2>Latest from Tiwi</h2>
            </div>
            <a class="button ghost" href="{{ route('blog.index') }}">Read blog</a>
        </div>
        <div class="grid">
            @foreach($posts as $post)
                <article class="card">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                    <a class="button secondary" href="{{ route('blog.show', $post) }}">Read</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="container section-head">
        <div>
            <p class="eyebrow">Contact</p>
            <h2>Need a module linked from Tiwi?</h2>
            <p>Send a message and the team can recommend the right module path.</p>
        </div>
        <a class="button" href="{{ route('contact') }}">Start a conversation</a>
    </div>
</section>
@endsection
