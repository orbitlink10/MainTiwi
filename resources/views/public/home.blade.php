@extends('layouts.public')

@section('content')
@php
$iconColors = ['ic-0','ic-1','ic-2','ic-3','ic-4','ic-5','ic-6'];
$icons = [
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="13" rx="2"/><path d="M8 21h8M12 17v4"/><circle cx="7.5" cy="9.5" r=".5" fill="currentColor"/><circle cx="12" cy="9.5" r=".5" fill="currentColor"/><circle cx="16.5" cy="9.5" r=".5" fill="currentColor"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H4a1 1 0 01-1-1z"/><path d="M9 22V12h6v10"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c0 2 2.686 3 6 3s6-1 6-3v-5"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M10.54 16.1a6 6 0 012.92 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l6-3 6 3 6-3v13l-6 3-6-3-6 3V7z"/><path d="M9 4v13M15 7v13"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>',
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M12 8v8M8 12h8"/></svg>',
];
@endphp

{{-- ===================================================
     HERO
     =================================================== --}}
<section class="hero">
    <div class="container hero-inner">

        <div>
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                Trusted by 500+ East African businesses
            </div>

            <h1>
                Run Your Entire<br>
                Business on <span class="gradient-text">One Platform</span>
            </h1>

            <p class="hero-sub">
                Tiwi unifies Point of Sale, Property Management, School Administration,
                Hotspot Billing, Itinerary Building, Manufacturing, and Hospital Management
                into a single, powerful platform — built and supported locally.
            </p>

            <div class="hero-actions">
                <a class="btn btn-primary btn-lg" href="{{ route('modules.index') }}">
                    Start for Free
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a class="btn btn-ghost-light btn-lg" href="{{ route('contact') }}">Watch Demo</a>
            </div>

            <div class="hero-trust">
                <div class="hero-avatars">
                    <div class="hero-avatar">JM</div>
                    <div class="hero-avatar">AW</div>
                    <div class="hero-avatar">PN</div>
                    <div class="hero-avatar">KO</div>
                </div>
                <p class="hero-trust-text" style="margin:0">Joined by 500+ businesses this year</p>
            </div>
        </div>

        {{-- CSS-only dashboard mockup --}}
        <div class="hero-mockup">
            <div class="mockup-titlebar">
                <div class="mockup-dots">
                    <span class="mockup-dot dot-r"></span>
                    <span class="mockup-dot dot-y"></span>
                    <span class="mockup-dot dot-g"></span>
                </div>
                <div class="mockup-url">tiwi.co.ke/dashboard</div>
            </div>
            <div class="mockup-body">
                <div class="mockup-sidebar">
                    <div class="mock-menu-item active"><span class="mock-menu-dot"></span>Dashboard</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>Point of Sale</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>Property</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>School</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>Hotspot</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>Manufacturing</div>
                    <div class="mock-menu-item"><span class="mock-menu-dot"></span>Hospital</div>
                </div>
                <div class="mockup-main">
                    <div class="mock-stats-row">
                        <div class="mock-stat">
                            <span class="mock-stat-label">Today's Sales</span>
                            <span class="mock-stat-val">KES 84,200</span>
                            <span class="mock-stat-delta">↑ 12%</span>
                        </div>
                        <div class="mock-stat">
                            <span class="mock-stat-label">Tenants</span>
                            <span class="mock-stat-val">248</span>
                            <span class="mock-stat-delta">↑ 3</span>
                        </div>
                        <div class="mock-stat">
                            <span class="mock-stat-label">Patients</span>
                            <span class="mock-stat-val">37</span>
                            <span class="mock-stat-delta">Active</span>
                        </div>
                    </div>
                    <div class="mock-chart-area">
                        <div class="mock-bar" style="height:40%"></div>
                        <div class="mock-bar" style="height:65%"></div>
                        <div class="mock-bar" style="height:55%"></div>
                        <div class="mock-bar" style="height:80%"></div>
                        <div class="mock-bar" style="height:60%"></div>
                        <div class="mock-bar" style="height:90%"></div>
                        <div class="mock-bar" style="height:70%"></div>
                    </div>
                    <div class="mock-list">
                        <div class="mock-list-row">
                            <span class="mock-list-dot" style="background:#0d9488"></span>
                            <span class="mock-list-name">Nairobi West Branch</span>
                            <span class="mock-list-badge">Active</span>
                        </div>
                        <div class="mock-list-row">
                            <span class="mock-list-dot" style="background:#3b82f6"></span>
                            <span class="mock-list-name">Westlands School</span>
                            <span class="mock-list-badge">Active</span>
                        </div>
                        <div class="mock-list-row">
                            <span class="mock-list-dot" style="background:#8b5cf6"></span>
                            <span class="mock-list-name">Marina Apartments</span>
                            <span class="mock-list-badge">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ===================================================
     TRUSTED BY
     =================================================== --}}
<div class="trusted-strip">
    <div class="container">
        <div class="trusted-inner">
            <span class="trusted-label">Trusted by</span>
            <div class="trusted-logos">
                <span class="trusted-logo">Nairobi Retail Group</span>
                <span class="trusted-logo">Savanna Properties</span>
                <span class="trusted-logo">Sunrise Academy</span>
                <span class="trusted-logo">NetConnect ISP</span>
                <span class="trusted-logo">Rift Valley Tours</span>
                <span class="trusted-logo">MedCare Hospital</span>
            </div>
        </div>
    </div>
</div>

{{-- ===================================================
     STATS BAR
     =================================================== --}}
<div class="stats-bar">
    <div class="container">
        <div class="stats-bar-grid">
            <div class="stats-bar-item">
                <span class="stats-num">7</span>
                <p class="stats-lbl">Integrated Systems</p>
            </div>
            <div class="stats-bar-item">
                <span class="stats-num">500+</span>
                <p class="stats-lbl">Active Businesses</p>
            </div>
            <div class="stats-bar-item">
                <span class="stats-num">5+</span>
                <p class="stats-lbl">Countries</p>
            </div>
            <div class="stats-bar-item">
                <span class="stats-num">99.9%</span>
                <p class="stats-lbl">Uptime SLA</p>
            </div>
        </div>
    </div>
</div>

{{-- ===================================================
     SYSTEMS GRID
     =================================================== --}}
<section class="section bg-surface">
    <div class="container">
        <div class="section-head-row">
            <div class="section-head" style="margin-bottom:0">
                <div class="pill">Our Systems</div>
                <h2>One subscription.<br>Seven complete systems.</h2>
                <p>Stop juggling multiple vendors and logins. Everything your business needs — from the shop floor to the hospital ward — is connected through one Tiwi account.</p>
            </div>
            <a class="btn btn-outline" href="{{ route('modules.index') }}">Explore all systems</a>
        </div>

        <div class="systems-grid">
            @foreach($modules as $module)
            @php $idx = $loop->index % 7; @endphp
            <article class="system-card">
                <div class="system-icon {{ $iconColors[$idx] }}">{!! $icons[$idx] !!}</div>
                <h3>{{ $module->name }}</h3>
                <p>{{ $module->short_description ?: 'A purpose-built management system tailored for modern East African business operations.' }}</p>
                <a class="system-card-link" href="{{ route('modules.show', $module) }}">
                    Learn more
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================================================
     FEATURE SECTION 1 — Built for East Africa
     =================================================== --}}
<section class="feature-section bg-white">
    <div class="container">
        <div class="feature-grid">
            <div class="feature-content">
                <div class="pill">Why Tiwi</div>
                <h2>Built for how East African businesses actually work</h2>
                <p>Most enterprise software is designed for markets far removed from the realities of East African business — different currencies, tax structures, and workflows. Tiwi is designed, hosted, and supported locally.</p>

                <div class="feature-points">
                    <div class="feature-point">
                        <div class="fp-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div class="fp-body">
                            <h4>Locally hosted &amp; compliant</h4>
                            <p>Data stored on regional infrastructure. Fast, stable, and compliant with local regulations including KRA requirements.</p>
                        </div>
                    </div>
                    <div class="feature-point">
                        <div class="fp-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                        </div>
                        <div class="fp-body">
                            <h4>Dedicated human support</h4>
                            <p>Real people, local time zones. Onboarding, training, and ongoing technical support — not just a ticket system.</p>
                        </div>
                    </div>
                    <div class="feature-point">
                        <div class="fp-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        </div>
                        <div class="fp-body">
                            <h4>Scales with your growth</h4>
                            <p>Start with one module for KES 0 setup. Add more systems as your business expands — no migration costs.</p>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('about') }}">About Tiwi</a>
            </div>

            <div class="feature-visual">
                <div class="feature-visual-box feature-visual-dark">
                    <div class="mini-dash">
                        <div class="mini-dash-header">
                            <span class="mini-dash-title">Live Operations</span>
                            <span style="color:#34d399;font-size:.72rem;font-weight:700">● All systems online</span>
                        </div>
                        <div class="mini-metric">
                            <div class="mm-left"><span class="mm-dot" style="background:#0d9488"></span><span class="mm-name">Point of Sale</span></div>
                            <span class="mm-val">KES 84,200 today</span>
                        </div>
                        <div class="mini-metric">
                            <div class="mm-left"><span class="mm-dot" style="background:#3b82f6"></span><span class="mm-name">Property Management</span></div>
                            <span class="mm-val">248 tenants active</span>
                        </div>
                        <div class="mini-metric">
                            <div class="mm-left"><span class="mm-dot" style="background:#8b5cf6"></span><span class="mm-name">School Management</span></div>
                            <span class="mm-val">1,240 students</span>
                        </div>
                        <div class="mini-metric">
                            <div class="mm-left"><span class="mm-dot" style="background:#f59e0b"></span><span class="mm-name">Hotspot Billing</span></div>
                            <span class="mm-val">312 connections</span>
                        </div>
                        <div class="mini-metric">
                            <div class="mm-left"><span class="mm-dot" style="background:#10b981"></span><span class="mm-name">Hospital Management</span></div>
                            <span class="mm-val">37 patients today</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================================================
     HOW IT WORKS
     =================================================== --}}
<section class="section bg-surface">
    <div class="container">
        <div class="section-head" style="text-align:center;margin:0 auto 64px;max-width:600px">
            <div class="pill" style="justify-content:center">How It Works</div>
            <h2>Up and running in 3 steps</h2>
            <p>No complex migrations or lengthy contracts. Just the software your team needs, live in days.</p>
        </div>
        <div class="steps-grid">
            <div class="step">
                <div class="step-num">1</div>
                <h3>Choose your systems</h3>
                <p>Browse our seven integrated systems and select the ones that match your current operations. Mix and match as you grow.</p>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <h3>Onboard with our team</h3>
                <p>Our local support team walks you through setup, data import, and staff training — ensuring a smooth go-live from day one.</p>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <h3>Run your business</h3>
                <p>Manage everything from one unified dashboard. Add more modules whenever you're ready — no new contracts needed.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================================================
     WHY CARDS
     =================================================== --}}
<section class="section bg-white">
    <div class="container">
        <div class="section-head" style="text-align:center;margin:0 auto 56px;max-width:640px">
            <div class="pill" style="justify-content:center">The Tiwi Advantage</div>
            <h2>Everything connected. Nothing siloed.</h2>
            <p>When your POS talks to your accounting, and your school fees sync with your bank, your whole business runs smarter.</p>
        </div>
        <div class="why-grid">
            <div class="why-card">
                <div class="why-card-icon" style="background:#ccfbf1;color:#0f766e">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                </div>
                <h3>Single login, all systems</h3>
                <p>One account gives you access to every module your business uses. Switch between POS, Property, School, and Hospital in seconds — no re-logging.</p>
            </div>
            <div class="why-card">
                <div class="why-card-icon" style="background:#dbeafe;color:#1d4ed8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Enterprise security, local pricing</h3>
                <p>Bank-grade encryption, role-based access controls, and audit logs — at pricing designed for East African businesses, not Fortune 500 budgets.</p>
            </div>
            <div class="why-card">
                <div class="why-card-icon" style="background:#ede9fe;color:#7c3aed">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <h3>Real-time reporting across all modules</h3>
                <p>See your whole business in one dashboard. Revenue from POS, occupancy from Property, patient flow from Hospital — unified, real-time.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================================================
     TESTIMONIALS
     =================================================== --}}
<section class="section bg-surface">
    <div class="container">
        <div class="section-head" style="text-align:center;margin:0 auto 56px;max-width:540px">
            <div class="pill" style="justify-content:center">Customer Stories</div>
            <h2>Trusted by businesses across East Africa</h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-quote">"We switched from three separate systems to Tiwi and cut our admin time in half. Our POS, property portfolio, and staff scheduling are all in one place now."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">JM</div>
                    <div>
                        <span class="testimonial-name">James Mwangi</span>
                        <span class="testimonial-role">CEO, Savanna Retail Group — Nairobi</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-quote">"The school management module transformed how we collect fees and track attendance. The local support team had us fully onboarded within a week."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">AW</div>
                    <div>
                        <span class="testimonial-name">Agnes Wanjiku</span>
                        <span class="testimonial-role">Director, Sunrise Academy — Kisumu</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-quote">"Running a 200-bed hospital requires serious software. Tiwi's hospital module handles patient records, billing, and pharmacy — and the price is unbeatable."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">PN</div>
                    <div>
                        <span class="testimonial-name">Dr. Peter Njoroge</span>
                        <span class="testimonial-role">Medical Director, MedCare Hospital — Nakuru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================================================
     BLOG
     =================================================== --}}
@if($posts->isNotEmpty())
<section class="section bg-white">
    <div class="container">
        <div class="section-head-row">
            <div class="section-head" style="margin-bottom:0">
                <div class="pill">Insights</div>
                <h2>From the Tiwi blog</h2>
            </div>
            <a class="btn btn-surface" href="{{ route('blog.index') }}">All articles</a>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:22px">
            @foreach($posts as $post)
            <article class="testimonial-card" style="cursor:default">
                <div style="width:40px;height:40px;background:#ccfbf1;border-radius:9px;display:flex;align-items:center;justify-content:center;margin-bottom:16px">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0f766e" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <h3 style="font-size:.98rem;margin-bottom:8px">{{ $post->title }}</h3>
                <p style="font-size:.875rem;flex:1">{{ $post->excerpt }}</p>
                <a href="{{ route('blog.show', $post) }}" style="color:var(--brand-dark);font-size:.84rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;margin-top:16px">
                    Read article
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     CTA BAND
     =================================================== --}}
<section class="cta-band">
    <div class="container cta-inner">
        <div class="cta-eyebrow">Get Started Today</div>
        <h2>Ready to run your whole business on one platform?</h2>
        <p class="cta-lead">Join 500+ East African businesses already on Tiwi. Get started free — no credit card required.</p>
        <div class="cta-actions">
            <a class="btn btn-white btn-lg" href="{{ route('contact') }}">
                Request a Free Demo
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a class="btn btn-ghost-light btn-lg" href="{{ route('modules.index') }}">Explore Systems</a>
        </div>
    </div>
</section>

@endsection
