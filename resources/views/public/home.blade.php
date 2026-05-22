@extends('layouts.public')

@section('content')

@php
/**
 * Icon SVGs (stroke-based, 24×24 viewBox).
 * Cycled by $loop->index so each module card gets a unique color + icon.
 */
$iconColors = ['ic-teal','ic-blue','ic-purple','ic-amber','ic-green','ic-rose','ic-indigo'];

$iconSvgs = [
    /* 0 – POS */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="3" width="20" height="13" rx="2"/>
        <path d="M8 21h8M12 17v4"/>
        <circle cx="7.5" cy="9.5" r=".5" fill="currentColor"/>
        <circle cx="12" cy="9.5" r=".5" fill="currentColor"/>
        <circle cx="16.5" cy="9.5" r=".5" fill="currentColor"/>
    </svg>',

    /* 1 – Property */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z"/>
        <path d="M9 22V12h6v10"/>
    </svg>',

    /* 2 – School */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/>
        <path d="M6 12v5c0 2 2.686 3 6 3s6-1 6-3v-5"/>
    </svg>',

    /* 3 – Hotspot / WiFi */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M10.54 16.1a6 6 0 012.92 0"/>
        <circle cx="12" cy="20" r="1" fill="currentColor"/>
    </svg>',

    /* 4 – Itinerary / Map */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 7l6-3 6 3 6-3v13l-6 3-6-3-6 3V7z"/>
        <path d="M9 4v13M15 7v13"/>
    </svg>',

    /* 5 – Manufacturing / Gear */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="3"/>
        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
    </svg>',

    /* 6 – Hospital */
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="3" width="18" height="18" rx="2"/>
        <path d="M12 8v8M8 12h8"/>
    </svg>',
];

/* Pill colour dots for the hero panel (CSS bg colours) */
$pillColors = [
    'background:#0d9488',
    'background:#3b82f6',
    'background:#8b5cf6',
    'background:#f59e0b',
    'background:#10b981',
    'background:#f43f5e',
    'background:#6366f1',
];

/* Short tags shown under module name in hero pill */
$pillTags = [
    'Retail & Commerce',
    'Real Estate',
    'Education',
    'ISP Billing',
    'Travel & Tours',
    'Production',
    'Healthcare',
];
@endphp

{{-- =====================================================
     HERO
     ===================================================== --}}
<section class="hero">
    <div class="container hero-inner">

        {{-- Left: copy --}}
        <div>
            <div class="hero-eyebrow">
                <span class="hero-eyebrow-dot"></span>
                Trusted by businesses across East Africa
            </div>

            <h1>
                One Platform.<br>
                <em>Seven Powerful Systems.</em>
            </h1>

            <p class="hero-lead">
                Tiwi brings together the essential tools your business needs —
                Point of Sale, Property Management, School Administration,
                Hotspot Billing, Itinerary Building, Manufacturing, and Hospital Management —
                all in one integrated, locally supported platform.
            </p>

            <div class="hero-actions">
                <a class="btn btn-primary btn-lg" href="{{ route('modules.index') }}">
                    Explore All Systems
                </a>
                <a class="btn btn-ghost-light btn-lg" href="{{ route('contact') }}">
                    Request a Demo
                </a>
            </div>
        </div>

        {{-- Right: module panel --}}
        <div class="hero-panel">
            <div class="hero-panel-head">
                <p class="hero-panel-title">Available Systems</p>
                <span class="hero-panel-badge">7 Active</span>
            </div>

            <div class="module-pill-list">
                @foreach($modules as $i => $module)
                    @php $idx = $loop->index % count($pillColors); @endphp
                    <a class="module-pill" href="{{ route('modules.show', $module) }}">
                        <div class="pill-icon" style="{{ $pillColors[$idx] }}1a; color:{{ explode(':', $pillColors[$idx])[1] }}">
                            {!! $iconSvgs[$idx] !!}
                        </div>
                        <div>
                            <span class="pill-name">{{ $module->name }}</span>
                            <span class="pill-tag">{{ $pillTags[$idx] }}</span>
                        </div>
                        <span class="pill-arrow">›</span>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>

{{-- =====================================================
     STATS STRIP
     ===================================================== --}}
<div class="stats-strip">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">7</span>
                <p class="stat-label">Integrated Systems</p>
            </div>
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <p class="stat-label">Businesses Served</p>
            </div>
            <div class="stat-item">
                <span class="stat-number">5+</span>
                <p class="stat-label">Countries Active</p>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <p class="stat-label">Local Support</p>
            </div>
        </div>
    </div>
</div>

{{-- =====================================================
     SYSTEMS / MODULE GRID
     ===================================================== --}}
<section class="section bg-surface">
    <div class="container">
        <div class="section-header">
            <div class="section-header-text">
                <div class="section-label">Our Systems</div>
                <h2>Everything your business needs, connected</h2>
                <p class="section-lead">
                    Each Tiwi system is purpose-built for its industry, yet shares a common
                    platform — so your data, your team, and your reports all stay in one place.
                </p>
            </div>
            <a class="btn btn-outline" href="{{ route('modules.index') }}">View all systems</a>
        </div>

        <div class="modules-grid">
            @foreach($modules as $module)
                @php
                    $idx   = $loop->index % count($iconColors);
                    $color = $iconColors[$idx];
                    $svg   = $iconSvgs[$idx];
                @endphp
                <article class="module-card">
                    <div class="mod-icon {{ $color }}">{!! $svg !!}</div>
                    <h3>{{ $module->name }}</h3>
                    <p>{{ $module->short_description ?: 'A comprehensive management system tailored for modern business operations.' }}</p>
                    <a class="card-link" href="{{ route('modules.show', $module) }}">Learn more</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- =====================================================
     WHY TIWI
     ===================================================== --}}
<section class="section bg-white">
    <div class="container">
        <div class="why-grid">

            {{-- Left: text + feature list --}}
            <div class="why-text">
                <div class="section-label">Why Tiwi</div>
                <h2>Built for how East African businesses actually work</h2>
                <p>
                    Most enterprise software is designed for markets far removed from the realities of
                    East African business. Tiwi is different — designed, hosted, and supported locally,
                    with systems that reflect the workflows and regulations you deal with every day.
                </p>

                <ul class="feature-list">
                    <li class="feature-item">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                        <div class="feat-body">
                            <h4>Reliable & Locally Hosted</h4>
                            <p>Data stored on infrastructure within the region. Fast, stable, and compliant with local requirements.</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/>
                            </svg>
                        </div>
                        <div class="feat-body">
                            <h4>All Systems Under One Roof</h4>
                            <p>Switch between POS, Property, School, Hospital and more without logging into separate platforms.</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                            </svg>
                        </div>
                        <div class="feat-body">
                            <h4>Dedicated Human Support</h4>
                            <p>Real people, local time zones. Onboarding assistance, training, and ongoing technical support included.</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                            </svg>
                        </div>
                        <div class="feat-body">
                            <h4>Scales With Your Growth</h4>
                            <p>Start with one module. Add more as your business expands — no expensive migrations or vendor changes.</p>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Right: stat cards --}}
            <div class="why-visual">
                <div class="why-stat-card featured">
                    <span class="wsc-num">7</span>
                    <p>Integrated business systems available on a single subscription</p>
                </div>
                <div class="why-stat-card">
                    <span class="wsc-num">500+</span>
                    <p>Active business accounts</p>
                </div>
                <div class="why-stat-card">
                    <span class="wsc-num">99%</span>
                    <p>Platform uptime guarantee</p>
                </div>
                <div class="why-stat-card">
                    <span class="wsc-num">5+</span>
                    <p>Countries across East Africa</p>
                </div>
                <div class="why-stat-card">
                    <span class="wsc-num">3 hrs</span>
                    <p>Average support response time</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- =====================================================
     HOW IT WORKS
     ===================================================== --}}
<section class="section bg-surface">
    <div class="container">
        <div style="text-align:center; margin-bottom:56px;">
            <div class="section-label" style="justify-content:center;">How It Works</div>
            <h2>Up and running in three steps</h2>
            <p class="section-lead" style="margin:0 auto;">
                Getting started with Tiwi is straightforward. No complex migrations,
                no lengthy contracts — just the software your team needs, ready fast.
            </p>
        </div>

        <div class="steps-wrapper">
            <div class="step">
                <div class="step-num">1</div>
                <h3>Choose Your Systems</h3>
                <p>
                    Browse our seven integrated systems and select the ones that match
                    your current business operations. Mix and match as needed.
                </p>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <h3>Onboard With Our Team</h3>
                <p>
                    Our local support team walks you through setup, data import,
                    and staff training — ensuring a smooth transition from day one.
                </p>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <h3>Run Your Business</h3>
                <p>
                    Manage sales, staff, inventory, billing, and reporting from one
                    unified dashboard. Expand to new modules whenever you're ready.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- =====================================================
     BLOG / NEWS
     ===================================================== --}}
@if($posts->isNotEmpty())
<section class="section bg-white">
    <div class="container">
        <div class="section-header">
            <div class="section-header-text">
                <div class="section-label">Latest Insights</div>
                <h2>From the Tiwi blog</h2>
            </div>
            <a class="btn btn-outline" href="{{ route('blog.index') }}">All articles</a>
        </div>

        <div class="blog-grid">
            @foreach($posts as $post)
                <article class="blog-card">
                    <div class="blog-card-thumb">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <div class="blog-card-body">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <a class="blog-link" href="{{ route('blog.show', $post) }}">Read article</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- =====================================================
     CTA BAND
     ===================================================== --}}
<section class="cta-band">
    <div class="container cta-band-inner">
        <div class="section-label" style="justify-content:center; color:#5eead4; margin-bottom:16px;">
            <span style="background:#5eead4; width:20px; height:2px; border-radius:1px; display:block;"></span>
            Get Started Today
        </div>
        <h2>Ready to transform how your business operates?</h2>
        <p class="lead">
            Join hundreds of East African businesses already running on Tiwi.
            Talk to our team and have your first system live within days.
        </p>
        <div class="cta-actions">
            <a class="btn btn-white btn-lg" href="{{ route('contact') }}">
                Request a Free Demo
            </a>
            <a class="btn btn-ghost-light btn-lg" href="{{ route('modules.index') }}">
                Explore All Systems
            </a>
        </div>
    </div>
</section>

@endsection
