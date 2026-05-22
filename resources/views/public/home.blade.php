@extends('layouts.public')

@section('content')
@php
    $moduleColors = ['red', 'blue', 'green', 'yellow', 'purple', 'cyan', 'orange'];
    $shortNames = [
        'POS System' => 'POS',
        'Rental Management System' => 'Rental',
        'School Management System' => 'School',
        'Itinerary Builder' => 'Trips',
        'Hotspot Billing System' => 'Hotspot',
        'Hospital Management System' => 'Hospital',
        'Manufacturing System' => 'MFG',
    ];
@endphp

<section class="zoho-hero">
    <div class="container zoho-hero-inner">
        <p class="zoho-kicker">Tiwi Business Software Suite</p>
        <h1>Your business work, powered by Tiwi modules</h1>
        <p class="zoho-lead">
            A practical software suite for teams that need POS, rentals, school operations,
            itineraries, hotspot billing, hospitals, and manufacturing tools connected from one place.
        </p>
        <div class="zoho-actions">
            <a class="zoho-primary" href="{{ route('contact') }}">Get Started</a>
            <a class="zoho-link" href="{{ route('modules.index') }}">Explore all modules</a>
        </div>
    </div>
</section>

<section class="zoho-featured">
    <div class="container">
        <div class="zoho-section-title">
            <p>Featured modules</p>
            <a href="{{ route('modules.index') }}">Explore all solutions</a>
        </div>
        <div class="zoho-app-grid">
            @foreach($modules as $module)
                @php $color = $moduleColors[$loop->index % count($moduleColors)]; @endphp
                <a class="zoho-app-card" href="{{ route('modules.show', $module) }}">
                    <span class="zoho-app-icon {{ $color }}">{{ $shortNames[$module->name] ?? str($module->name)->substr(0, 3)->upper() }}</span>
                    <span>
                        <strong>{{ $module->name }}</strong>
                        <small>{{ $module->short_description }}</small>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="zoho-suite">
    <div class="container zoho-suite-grid">
        <div>
            <p class="zoho-kicker">All-in-one suite</p>
            <h2>Tiwi One</h2>
            <p>
                Run your public module catalogue, SEO pages, blog content, enquiries, and external module links from one Laravel dashboard.
            </p>
            <a class="zoho-primary" href="{{ route('pricing') }}">View pricing</a>
        </div>
        <blockquote>
            <p>"Tiwi gives every module a clear home, so teams can find the right system and start from a single trusted website."</p>
            <cite>Tiwi implementation team</cite>
        </blockquote>
    </div>
</section>

<section class="zoho-trust">
    <div class="container">
        <p>Built for teams managing daily operations</p>
        <div class="zoho-logo-row">
            <span>Retail</span>
            <span>Schools</span>
            <span>Hospitals</span>
            <span>Internet Providers</span>
            <span>Tour Operators</span>
            <span>Manufacturers</span>
        </div>
    </div>
</section>

<section class="zoho-values">
    <div class="container">
        <div class="zoho-values-head">
            <h2>Built with focus. Guided by practical business needs.</h2>
            <p>Tiwi keeps the main website focused on discovery, content management, lead capture, and clean access to separately built systems.</p>
        </div>
        <div class="zoho-values-grid">
            <article>
                <h3>Modular growth</h3>
                <p>Start with one business system and add more modules as operations expand.</p>
            </article>
            <article>
                <h3>Admin-managed content</h3>
                <p>Update module pages, SEO fields, blog posts, and homepage content from the dashboard.</p>
            </article>
            <article>
                <h3>Clean external access</h3>
                <p>Each module can live independently while Tiwi provides the marketing and access hub.</p>
            </article>
            <article>
                <h3>Responsive by default</h3>
                <p>The public website and admin views work across mobile, tablet, and desktop screens.</p>
            </article>
        </div>
    </div>
</section>

<section class="zoho-numbers">
    <div class="container zoho-number-grid">
        <div><strong>7</strong><span>Modules</span></div>
        <div><strong>1</strong><span>Main dashboard</span></div>
        <div><strong>100%</strong><span>Blade frontend</span></div>
        <div><strong>SEO</strong><span>Friendly URLs</span></div>
    </div>
</section>

@if($posts->isNotEmpty())
<section class="zoho-news">
    <div class="container">
        <div class="zoho-section-title">
            <p>News and updates</p>
            <a href="{{ route('blog.index') }}">Read the blog</a>
        </div>
        <div class="zoho-news-grid">
            @foreach($posts as $post)
                <article>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                    <a href="{{ route('blog.show', $post) }}">Read more</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="zoho-final-cta">
    <div class="container">
        <h2>Ready to manage Tiwi from one place?</h2>
        <p>Publish module pages, collect enquiries, and direct users to the right business system.</p>
        <a class="zoho-primary" href="{{ route('contact') }}">Contact Tiwi</a>
    </div>
</section>
@endsection
