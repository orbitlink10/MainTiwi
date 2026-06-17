@extends('layouts.public')

@section('content')
@php
    $moduleCount = $modules->count();
    $moduleImage = function ($module) {
        return $module->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($module->image)
            ? route('media.show', ['path' => $module->image])
            : null;
    };
@endphp

<style>
    .solutions-page{background:#fff;color:#111827;font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif}
    .solutions-shell{width:min(100% - 40px,1180px);margin:0 auto}
    .solutions-hero{border-bottom:1px solid #e5e7eb;background:linear-gradient(180deg,#fff 0,#f8fbff 100%);padding:72px 0 54px}
    .solutions-hero-grid{display:grid;grid-template-columns:minmax(0,1.15fr) minmax(300px,.85fr);gap:48px;align-items:end}
    .solutions-kicker{margin:0 0 14px;color:#ee0011;font-size:13px;line-height:18px;font-weight:900;letter-spacing:.16em;text-transform:uppercase}
    .solutions-title{max-width:780px;margin:0;color:#0f172a;font-size:clamp(42px,5vw,68px);line-height:1;font-weight:850;letter-spacing:0}
    .solutions-lead{max-width:700px;margin:22px 0 0;color:#475569;font-size:20px;line-height:1.6}
    .solutions-hero-panel{border:1px solid #e2e8f0;border-radius:8px;background:#fff;padding:26px;box-shadow:0 14px 36px rgba(15,23,42,.07)}
    .solutions-hero-panel h2{margin:0 0 10px;color:#111827;font-size:20px;line-height:28px;font-weight:850}
    .solutions-hero-panel p{margin:0;color:#475569;font-size:15px;line-height:1.7}
    .solutions-stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-top:24px}
    .solutions-stat{border-top:1px solid #e5e7eb;padding-top:14px}
    .solutions-stat strong{display:block;color:#111827;font-size:28px;line-height:1;font-weight:850}
    .solutions-stat span{display:block;margin-top:7px;color:#64748b;font-size:13px;line-height:18px;font-weight:700}
    .solutions-section{padding:56px 0 76px}
    .solutions-section-head{display:flex;align-items:end;justify-content:space-between;gap:28px;margin-bottom:24px}
    .solutions-section-head h2{margin:0;color:#111827;font-size:30px;line-height:1.18;font-weight:850;letter-spacing:0}
    .solutions-section-head p{max-width:520px;margin:0;color:#64748b;font-size:16px;line-height:1.65}
    .solutions-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}
    .solution-card{display:flex;min-height:100%;flex-direction:column;overflow:hidden;border:1px solid #e2e8f0;border-radius:8px;background:#fff;box-shadow:0 12px 30px rgba(15,23,42,.06);transition:transform .16s ease,box-shadow .16s ease,border-color .16s ease}
    .solution-card:hover{transform:translateY(-3px);border-color:#cbd5e1;box-shadow:0 18px 42px rgba(15,23,42,.09)}
    .solution-media{display:block;width:100%;aspect-ratio:16/9;background:linear-gradient(135deg,#eef7ff,#fff2f2);object-fit:cover}
    .solution-media-empty{display:grid;place-items:center;color:#0f172a;font-size:34px;font-weight:900}
    .solution-body{display:flex;flex:1;flex-direction:column;padding:24px}
    .solution-label{margin:0 0 10px;color:#ee0011;font-size:12px;line-height:16px;font-weight:900;letter-spacing:.14em;text-transform:uppercase}
    .solution-body h3{margin:0;color:#111827;font-size:22px;line-height:1.25;font-weight:850;letter-spacing:0}
    .solution-body p{margin:14px 0 22px;color:#475569;font-size:15px;line-height:1.7}
    .solution-actions{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-top:auto}
    .solution-link{display:inline-flex;align-items:center;justify-content:center;min-height:42px;padding:0 16px;border:1px solid #111827;border-radius:6px;color:#111827;font-size:14px;font-weight:850;text-decoration:none}
    .solution-link:hover{background:#111827;color:#fff}
    .solution-external{color:#64748b;font-size:13px;font-weight:800;text-decoration:none}
    .solution-external:hover{color:#ee0011}
    .solutions-empty{border:1px solid #e2e8f0;border-radius:8px;background:#f8fafc;padding:28px;color:#475569;font-size:16px;line-height:1.65}
    .solutions-cta{margin-top:46px;border-radius:8px;background:#421983;padding:34px;color:#fff}
    .solutions-cta-grid{display:flex;align-items:center;justify-content:space-between;gap:28px}
    .solutions-cta h2{margin:0 0 8px;font-size:28px;line-height:36px;font-weight:850}
    .solutions-cta p{max-width:640px;margin:0;color:#eee9ff;font-size:16px;line-height:1.65}
    .solutions-cta a{display:inline-flex;align-items:center;justify-content:center;min-height:44px;white-space:nowrap;border-radius:6px;background:#ee0011;padding:0 18px;color:#fff;font-size:15px;font-weight:850;text-decoration:none}
    @media(max-width:1050px){.solutions-hero-grid,.solutions-grid{grid-template-columns:1fr 1fr}.solutions-hero-panel{align-self:stretch}.solutions-grid .solution-card:first-child{grid-column:auto}}
    @media(max-width:760px){.solutions-shell{width:min(100% - 32px,1180px)}.solutions-hero{padding:46px 0 38px}.solutions-hero-grid,.solutions-grid{grid-template-columns:1fr}.solutions-title{font-size:38px}.solutions-lead{font-size:18px}.solutions-stats{grid-template-columns:1fr}.solutions-section-head,.solutions-cta-grid{align-items:flex-start;flex-direction:column}.solutions-section{padding:42px 0 58px}}
</style>

<main class="solutions-page">
    <section class="solutions-hero">
        <div class="solutions-shell solutions-hero-grid">
            <div>
                <p class="solutions-kicker">Solutions</p>
                <h1 class="solutions-title">Business software modules for practical operations</h1>
                <p class="solutions-lead">Explore Tiwi-managed product pages and connect to each specialist system from one clear software hub.</p>
            </div>

            <aside class="solutions-hero-panel" aria-label="Solutions overview">
                <h2>Choose the right operating system for each workflow.</h2>
                <p>Every module is presented with its purpose, operating fit, features, and next action so teams can compare options without scanning a sparse directory.</p>
                <div class="solutions-stats">
                    <div class="solutions-stat"><strong>{{ $moduleCount }}</strong><span>Active modules</span></div>
                    <div class="solutions-stat"><strong>1</strong><span>Marketing hub</span></div>
                    <div class="solutions-stat"><strong>24/7</strong><span>Online access</span></div>
                </div>
            </aside>
        </div>
    </section>

    <section class="solutions-section">
        <div class="solutions-shell">
            <div class="solutions-section-head">
                <div>
                    <p class="solutions-kicker">Product Catalogue</p>
                    <h2>Available Tiwi modules</h2>
                </div>
                <p>Review the systems currently marketed through Tiwi, then open the detailed page for positioning, features, pricing notes, and access links.</p>
            </div>

            @if($modules->isNotEmpty())
                <div class="solutions-grid">
                    @foreach($modules as $module)
                        @php($imageUrl = $moduleImage($module))
                        <article class="solution-card">
                            @if($imageUrl)
                                <img class="solution-media" src="{{ $imageUrl }}" alt="{{ $module->name }}">
                            @else
                                <div class="solution-media solution-media-empty" aria-hidden="true">{{ \Illuminate\Support\Str::of($module->name)->substr(0, 2)->upper() }}</div>
                            @endif
                            <div class="solution-body">
                                <p class="solution-label">Module</p>
                                <h3>{{ $module->name }}</h3>
                                <p>{{ $module->short_description }}</p>
                                <div class="solution-actions">
                                    <a class="solution-link" href="{{ route('modules.show', $module) }}">Learn more</a>
                                    @if($module->external_url)
                                        <a class="solution-external" href="{{ $module->external_url }}" target="_blank" rel="noopener">Open system</a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="solutions-empty">No active modules are available yet.</div>
            @endif

            <div class="solutions-cta">
                <div class="solutions-cta-grid">
                    <div>
                        <h2>Need help choosing a module?</h2>
                        <p>Tell us about your team, workflow, and current tools. Tiwi can point you to the right product path.</p>
                    </div>
                    <a href="{{ route('contact') }}">Request guidance</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
