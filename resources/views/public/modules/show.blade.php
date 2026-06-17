@extends('layouts.public')

@section('content')
@php
    $imageUrl = $module->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($module->image)
        ? route('media.show', ['path' => $module->image])
        : null;
    $features = collect($module->features ?? [])->filter()->values();
@endphp

<style>
    .module-page{background:#fff;color:#111827;font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif}
    .module-shell{width:min(100% - 40px,1180px);margin:0 auto}
    .module-hero{border-bottom:1px solid #e5e7eb;background:linear-gradient(180deg,#fff 0,#f8fbff 100%);padding:70px 0 54px}
    .module-hero-grid{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(320px,.95fr);gap:54px;align-items:center}
    .module-kicker{margin:0 0 14px;color:#ee0011;font-size:13px;line-height:18px;font-weight:900;letter-spacing:.16em;text-transform:uppercase}
    .module-title{max-width:760px;margin:0;color:#0f172a;font-size:clamp(42px,5vw,66px);line-height:1;font-weight:850;letter-spacing:0}
    .module-lead{max-width:690px;margin:22px 0 0;color:#475569;font-size:20px;line-height:1.6}
    .module-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:28px}
    .module-button{display:inline-flex;align-items:center;justify-content:center;min-height:46px;border-radius:6px;padding:0 18px;font-size:15px;font-weight:850;text-decoration:none}
    .module-button.primary{border:1px solid #ee0011;background:#ee0011;color:#fff}
    .module-button.secondary{border:1px solid #111827;background:#fff;color:#111827}
    .module-button.secondary:hover{background:#111827;color:#fff}
    .module-visual{overflow:hidden;border:1px solid #e2e8f0;border-radius:8px;background:#eef7ff;box-shadow:0 14px 36px rgba(15,23,42,.07)}
    .module-visual img{display:block;width:100%;aspect-ratio:16/10;object-fit:cover}
    .module-visual-empty{display:grid;min-height:320px;place-items:center;background:linear-gradient(135deg,#eef7ff,#fff2f2);color:#0f172a;font-size:54px;font-weight:900}
    .module-section{padding:56px 0 78px}
    .module-grid{display:grid;grid-template-columns:minmax(0,760px) 300px;gap:72px;align-items:start}
    .module-content h2{margin:0 0 18px;color:#111827;font-size:34px;line-height:1.18;font-weight:850;letter-spacing:0}
    .module-content p{margin:0 0 22px;color:#334155;font-size:18px;line-height:1.72}
    .module-content-block{padding-bottom:34px;border-bottom:1px solid #e5e7eb;margin-bottom:34px}
    .module-feature-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin-top:20px}
    .module-feature{border:1px solid #e2e8f0;border-radius:8px;background:#fff;padding:18px;color:#243041;font-size:15px;line-height:1.55;font-weight:750}
    .module-feature::before{content:"";display:block;width:28px;height:3px;margin-bottom:13px;border-radius:999px;background:#ee0011}
    .module-aside{position:sticky;top:98px;display:grid;gap:18px}
    .module-panel{border:1px solid #e7e9ef;border-radius:8px;background:#fff;padding:22px;box-shadow:0 10px 30px rgba(17,24,39,.06)}
    .module-panel h2{margin:0 0 14px;color:#111827;font-size:18px;line-height:24px;font-weight:850}
    .module-panel p{margin:0;color:#475569;font-size:14px;line-height:1.65}
    .module-meta-list{display:grid;gap:12px;margin:0;padding:0;list-style:none}
    .module-meta-list li{display:flex;justify-content:space-between;gap:14px;border-bottom:1px solid #edf0f5;padding-bottom:12px;color:#475569;font-size:14px}
    .module-meta-list li:last-child{border-bottom:0;padding-bottom:0}
    .module-meta-list strong{color:#111827}
    .module-side-link{display:flex;align-items:center;justify-content:center;min-height:42px;margin-top:16px;border-radius:6px;background:#111827;color:#fff;font-size:14px;font-weight:850;text-decoration:none}
    .module-back{display:inline-flex;align-items:center;margin-bottom:24px;color:#64748b;font-size:14px;font-weight:850;text-decoration:none}
    .module-back:hover{color:#ee0011}
    @media(max-width:980px){.module-hero-grid,.module-grid{grid-template-columns:1fr}.module-aside{position:static}.module-feature-grid{grid-template-columns:1fr}}
    @media(max-width:640px){.module-shell{width:min(100% - 32px,1180px)}.module-hero{padding:46px 0 38px}.module-title{font-size:38px}.module-lead{font-size:18px}.module-section{padding:42px 0 58px}.module-actions{flex-direction:column}.module-button{width:100%}}
</style>

<main class="module-page">
    <section class="module-hero">
        <div class="module-shell module-hero-grid">
            <div>
                <p class="module-kicker">Module</p>
                <h1 class="module-title">{{ $module->name }}</h1>
                <p class="module-lead">{{ $module->short_description }}</p>
                <div class="module-actions">
                    @if($module->external_url)
                        <a class="module-button primary" href="{{ $module->external_url }}" target="_blank" rel="noopener">Open module</a>
                    @endif
                    <a class="module-button secondary" href="{{ route('contact') }}">Ask about this module</a>
                </div>
            </div>

            <div class="module-visual">
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $module->name }}">
                @else
                    <div class="module-visual-empty" aria-hidden="true">{{ \Illuminate\Support\Str::of($module->name)->substr(0, 2)->upper() }}</div>
                @endif
            </div>
        </div>
    </section>

    <section class="module-section">
        <div class="module-shell module-grid">
            <article class="module-content">
                <a class="module-back" href="{{ route('modules.index') }}">Back to all modules</a>

                <div class="module-content-block">
                    <p class="module-kicker">Overview</p>
                    <h2>What this module supports</h2>
                    <p>{{ $module->full_description }}</p>
                </div>

                <div class="module-content-block">
                    <p class="module-kicker">Features</p>
                    <h2>Core capabilities</h2>
                    @if($features->isNotEmpty())
                        <div class="module-feature-grid">
                            @foreach($features as $feature)
                                <div class="module-feature">{{ $feature }}</div>
                            @endforeach
                        </div>
                    @else
                        <p>Feature details are being prepared for this module.</p>
                    @endif
                </div>

                <div>
                    <p class="module-kicker">Pricing</p>
                    <h2>Commercial notes</h2>
                    <p>{{ $module->pricing_text ?: 'Contact Tiwi for pricing information and implementation guidance.' }}</p>
                </div>
            </article>

            <aside class="module-aside" aria-label="Module summary">
                <div class="module-panel">
                    <h2>Module summary</h2>
                    <ul class="module-meta-list">
                        <li><span>Type</span><strong>Software module</strong></li>
                        <li><span>Status</span><strong>Available</strong></li>
                        <li><span>Features</span><strong>{{ $features->count() ?: 'Pending' }}</strong></li>
                    </ul>
                    @if($module->external_url)
                        <a class="module-side-link" href="{{ $module->external_url }}" target="_blank" rel="noopener">Open system</a>
                    @endif
                </div>

                <div class="module-panel">
                    <h2>Need implementation help?</h2>
                    <p>Share your operating context and Tiwi can help you confirm whether this module fits your workflow.</p>
                    <a class="module-side-link" href="{{ route('contact') }}">Request a demo</a>
                </div>
            </aside>
        </div>
    </section>
</main>
@endsection
