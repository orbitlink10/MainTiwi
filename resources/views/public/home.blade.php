@extends('layouts.public')

@section('content')
@php
    $moduleMeta = [
        'POS System' => ['short' => 'POS', 'category' => 'Retail & Commerce', 'color' => 'teal', 'symbol' => 'POS'],
        'Rental Management System' => ['short' => 'Rent', 'category' => 'Real Estate', 'color' => 'blue', 'symbol' => 'RE'],
        'School Management System' => ['short' => 'School', 'category' => 'Education', 'color' => 'purple', 'symbol' => 'EDU'],
        'Itinerary Builder' => ['short' => 'Trips', 'category' => 'Travel & Tours', 'color' => 'amber', 'symbol' => 'TRP'],
        'Hotspot Billing System' => ['short' => 'Hotspot', 'category' => 'ISP Billing', 'color' => 'green', 'symbol' => 'ISP'],
        'Hospital Management System' => ['short' => 'Care', 'category' => 'Healthcare', 'color' => 'rose', 'symbol' => 'HOS'],
        'Manufacturing System' => ['short' => 'MFG', 'category' => 'Production', 'color' => 'indigo', 'symbol' => 'MFG'],
    ];
@endphp

<section class="z-hero">
    <div class="container z-hero-inner">
        <p class="z-kicker">Tiwi Business Software Suite</p>
        <h1>Your business work, powered by Tiwi modules</h1>
        <p class="z-lead">
            A central website and dashboard for marketing, managing, and linking to the business systems your teams use every day.
        </p>
        <a class="z-red-cta" href="{{ route('contact') }}">Get started for free <span>›</span></a>
    </div>
</section>

<section class="z-featured-wrap">
    <div class="container">
        <div class="z-featured-panel">
            <aside class="z-promo-card">
                <div class="z-promo-orbit">
                    <span class="z-promo-tile">Ti</span>
                </div>
                <h2>Introducing<br>Tiwi One</h2>
                <p>One main website for module discovery, SEO pages, enquiries, and external system access.</p>
                <a href="{{ route('modules.index') }}">Explore Tiwi modules <span>›</span></a>
            </aside>

            <div class="z-featured-apps">
                <div class="z-panel-head">
                    <h2>Featured apps</h2>
                    <a href="{{ route('modules.index') }}">Explore all products <span>›</span></a>
                </div>

                <div class="z-app-list">
                    @foreach($modules->take(6) as $module)
                        @php $meta = $moduleMeta[$module->name] ?? ['short' => str($module->name)->substr(0, 3)->upper(), 'category' => 'Business Software', 'color' => 'blue', 'symbol' => 'monitor']; @endphp
                        <a class="z-app-item" href="{{ route('modules.show', $module) }}">
                            <span class="z-line-icon {{ $meta['color'] }}" data-symbol="{{ $meta['symbol'] }}"></span>
                            <span>
                                <strong>{{ $module->name }}</strong>
                                <small>{{ $module->short_description }}</small>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="z-suite-band">
    <div class="container z-suite-grid">
        <div>
            <p class="z-kicker">All-in-one suite</p>
            <h2>Tiwi One</h2>
            <p>Run your public module catalogue, CMS pages, blog content, SEO metadata, homepage sections, and lead submissions from one Laravel dashboard.</p>
            <a class="z-red-cta small" href="{{ route('pricing') }}">View pricing <span>›</span></a>
        </div>
        <blockquote>
            <p>"Tiwi gives every business module a clear home, while each specialist system remains free to grow independently."</p>
            <cite>Tiwi implementation team</cite>
        </blockquote>
    </div>
</section>

<section class="z-dark-modules">
    <div class="container z-dark-grid">
        <div>
            <p class="z-dark-eyebrow">Module Directory</p>
            <h2>Choose the system your team needs next.</h2>
            <p>Each module can be activated, described, priced, and linked to its own external application from the admin dashboard.</p>
        </div>
        <div class="z-module-list">
            @foreach($modules as $module)
                @php $meta = $moduleMeta[$module->name] ?? ['category' => 'Business Software', 'color' => 'blue', 'symbol' => 'monitor']; @endphp
                <a class="z-dark-module" href="{{ route('modules.show', $module) }}">
                    <span class="z-dark-icon {{ $meta['color'] }}" data-symbol="{{ $meta['symbol'] }}"></span>
                    <span class="z-dark-copy">
                        <strong>{{ $module->name }}</strong>
                        <small>{{ $meta['category'] }}</small>
                    </span>
                    <span class="z-chevron">›</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="z-values">
    <div class="container">
        <div class="z-values-head">
            <h2>The core features that keep Tiwi useful</h2>
            <p>Built around the website and dashboard work a modular software brand needs before each product is opened.</p>
        </div>
        <div class="z-values-grid">
            <article>
                <h3>Admin dashboard</h3>
                <p>Manage modules, CMS pages, blog posts, contact messages, and homepage content.</p>
            </article>
            <article>
                <h3>SEO-ready content</h3>
                <p>Each module, page, and blog post supports clean slugs, meta titles, and descriptions.</p>
            </article>
            <article>
                <h3>External module links</h3>
                <p>Send visitors to separately built POS, school, hospital, rental, hotspot, travel, or manufacturing systems.</p>
            </article>
            <article>
                <h3>Responsive frontend</h3>
                <p>Public pages and admin screens are structured for mobile and desktop use.</p>
            </article>
        </div>
    </div>
</section>

<section class="z-number-band">
    <div class="container z-number-grid">
        <div><strong>7</strong><span>Marketed modules</span></div>
        <div><strong>CMS</strong><span>Editable pages</span></div>
        <div><strong>SEO</strong><span>Friendly URLs</span></div>
        <div><strong>MySQL</strong><span>Laravel backend</span></div>
    </div>
</section>

@if($posts->isNotEmpty())
<section class="z-news">
    <div class="container">
        <div class="z-panel-head">
            <h2>News and updates</h2>
            <a href="{{ route('blog.index') }}">Read the blog <span>›</span></a>
        </div>
        <div class="z-news-grid">
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

<section class="z-final-cta">
    <div class="container">
        <h2>Ready to do your best work?</h2>
        <p>Let Tiwi become the main entry point for your business software modules.</p>
        <a class="z-red-cta" href="{{ route('contact') }}">Sign up now <span>›</span></a>
    </div>
</section>
@endsection
