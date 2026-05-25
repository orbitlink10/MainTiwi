@extends('layouts.public')

@section('content')
@php
    $featuredProducts = [
        [
            'name' => 'POS',
            'display_name' => 'POS',
            'description' => 'Complete point-of-sale software for retail, inventory, branches, and sales reporting.',
            'key' => 'pos',
            'accent' => 'blue',
        ],
        [
            'name' => 'Property Management System',
            'display_name' => 'Property',
            'description' => 'Manage tenants, units, rent collection, service requests, and property records.',
            'key' => 'property',
            'accent' => 'green',
        ],
        [
            'name' => 'School Management System',
            'display_name' => 'School',
            'description' => 'Organize learners, fees, classes, exams, admissions, and school communication.',
            'key' => 'school',
            'accent' => 'blue',
        ],
        [
            'name' => 'Itinerary Builder',
            'display_name' => 'Trips',
            'description' => 'Build travel plans, quotes, day-by-day routes, and polished client proposals.',
            'key' => 'itinerary',
            'accent' => 'amber',
        ],
        [
            'name' => 'Manufacturing Management System',
            'display_name' => 'Manufacturing',
            'description' => 'Plan production, materials, work orders, costing, and finished-goods movement.',
            'key' => 'manufacturing',
            'accent' => 'green',
        ],
        [
            'name' => 'Tiwi One',
            'display_name' => 'Tiwi One',
            'description' => 'A unified business software suite for product discovery, access, and growth.',
            'key' => 'suite',
            'accent' => 'blue',
        ],
    ];

@endphp

<style>
    .tiwi-zoho-home {
        background:
            repeating-linear-gradient(60deg, rgba(37, 99, 235, .08) 0 1px, transparent 1px 18px),
            radial-gradient(ellipse at 50% -8%, #fff 0, #fff 48%, #f9fbff 100%);
        border-bottom: 1px solid #e5e7eb;
        padding: 16px 0 90px;
    }

    .tiwi-zoho-shell {
        width: min(1706px, calc(100% - 96px));
        margin: 0 auto;
    }

    .tiwi-zoho-card {
        display: grid;
        grid-template-columns: clamp(420px, 34vw, 600px) minmax(0, 1fr);
        gap: clamp(42px, 3.5vw, 68px);
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        box-shadow: 0 18px 38px rgba(15, 23, 42, .06);
        padding: 22px 44px 22px 22px;
    }

    .tiwi-zoho-promo {
        min-height: 552px;
        border-radius: 12px;
        overflow: hidden;
        color: #fff;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 52px 50px;
        background:
            linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.06) 1px, transparent 1px),
            radial-gradient(circle at 56% 22%, rgba(196, 90, 255, .45), transparent 18%),
            linear-gradient(160deg, #4b1686 0%, #5f1aa0 45%, #42116f 100%);
        background-size: 50px 50px, 50px 50px, auto, auto;
    }

    .tiwi-zoho-promo-mark {
        display: grid;
        place-items: center;
        width: 94px;
        height: 94px;
        margin-bottom: 30px;
    }

    .tiwi-zoho-promo-mark span {
        display: grid;
        place-items: center;
        width: 76px;
        height: 76px;
        border: 1px solid rgba(255, 255, 255, .22);
        border-radius: 16px;
        background: #260755;
        box-shadow: 0 0 38px rgba(58, 160, 255, .45);
        color: #fff;
        font-size: 24px;
        font-weight: 800;
        transform: rotate(-9deg);
    }

    .tiwi-zoho-promo h2 {
        margin: 0;
        color: #d9c8ff;
        font-size: 49px;
        font-weight: 400;
        line-height: 1.18;
        letter-spacing: 0;
    }

    .tiwi-zoho-promo p {
        max-width: 510px;
        margin: 24px 0 38px;
        color: #fff;
        font-size: 24px;
        line-height: 1.48;
        font-weight: 400;
    }

    .tiwi-zoho-promo a {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        min-height: 66px;
        padding: 0 42px;
        border: 2px solid #8bbcff;
        border-radius: 999px;
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .01em;
    }

    .tiwi-zoho-apps {
        padding-top: 22px;
    }

    .tiwi-zoho-apps-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        height: 88px;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 76px;
    }

    .tiwi-zoho-apps-head h2 {
        margin: 0;
        color: #111827;
        font-size: 20px;
        font-weight: 700;
        line-height: 1;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .tiwi-zoho-apps-head a {
        display: inline-flex;
        align-items: center;
        gap: 18px;
        color: #0067b8;
        font-size: 20px;
        font-weight: 500;
        line-height: 1;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .tiwi-zoho-apps-head a span {
        color: #0067b8;
        font-size: 36px;
        font-weight: 300;
        line-height: .5;
    }

    .tiwi-zoho-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 72px;
        row-gap: 56px;
    }

    .tiwi-zoho-app {
        display: grid;
        grid-template-columns: 48px minmax(0, 1fr);
        gap: 22px;
        align-items: start;
        min-width: 0;
    }

    .tiwi-zoho-icon {
        width: 48px;
        height: 48px;
        color: #2878c8;
    }

    .tiwi-zoho-icon.green { color: #00a65a; }
    .tiwi-zoho-icon.amber { color: #f59e0b; }

    .tiwi-zoho-icon svg {
        display: block;
        width: 48px;
        height: 48px;
        fill: none;
        stroke: currentColor;
        stroke-width: 3.2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .tiwi-zoho-icon svg * {
        fill: none;
        stroke: currentColor;
    }

    .tiwi-zoho-copy strong {
        display: block;
        margin: 0 0 12px;
        color: #000;
        font-size: 32px;
        font-weight: 400;
        line-height: 1.1;
        letter-spacing: 0;
    }

    .tiwi-zoho-copy small {
        display: block;
        color: #111;
        font-size: 21px;
        font-weight: 400;
        line-height: 1.28;
    }

    @media (max-width: 1320px) {
        .tiwi-zoho-shell { width: min(1240px, calc(100% - 48px)); }
        .tiwi-zoho-card {
            grid-template-columns: 390px minmax(0, 1fr);
            gap: 46px;
            padding-right: 30px;
        }
        .tiwi-zoho-promo { min-height: 500px; padding: 42px 34px; }
        .tiwi-zoho-promo h2 { font-size: 42px; }
        .tiwi-zoho-promo p { font-size: 20px; }
        .tiwi-zoho-grid { column-gap: 42px; }
        .tiwi-zoho-copy strong { font-size: 29px; }
        .tiwi-zoho-copy small { font-size: 19px; }
    }

    @media (max-width: 980px) {
        .tiwi-zoho-card { grid-template-columns: 1fr; padding: 18px; }
        .tiwi-zoho-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 680px) {
        .tiwi-zoho-home { padding: 12px 0 48px; }
        .tiwi-zoho-shell { width: calc(100% - 28px); }
        .tiwi-zoho-promo { min-height: 380px; }
        .tiwi-zoho-promo h2 { font-size: 34px; }
        .tiwi-zoho-promo p { font-size: 18px; }
        .tiwi-zoho-apps-head {
            height: auto;
            min-height: 96px;
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 38px;
        }
        .tiwi-zoho-apps-head h2,
        .tiwi-zoho-apps-head a { font-size: 17px; }
        .tiwi-zoho-grid { grid-template-columns: 1fr; gap: 34px; }
        .tiwi-zoho-copy strong { font-size: 27px; }
        .tiwi-zoho-copy small { font-size: 18px; }
    }
</style>

<section class="tiwi-zoho-home">
    <div class="tiwi-zoho-shell">
        <div class="tiwi-zoho-card">
            <aside class="tiwi-zoho-promo">
                <div class="tiwi-zoho-promo-mark"><span>Ti</span></div>
                <h2>Introducing<br>Tiwi One</h2>
                <p>Run POS, property, school, travel, and manufacturing operations from one polished software suite.</p>
                <a href="{{ route('modules.index') }}">Explore Tiwi apps <span>&rsaquo;</span></a>
            </aside>

            <div class="tiwi-zoho-apps">
                <div class="tiwi-zoho-apps-head">
                    <h2>Featured Apps</h2>
                    <a href="{{ route('modules.index') }}">Explore all products <span>&rsaquo;</span></a>
                </div>

                <div class="tiwi-zoho-grid">
                    @foreach($featuredProducts as $product)
                        <a href="{{ route('modules.index') }}" class="tiwi-zoho-app">
                            <span class="tiwi-zoho-icon {{ $product['accent'] }}" aria-hidden="true">
                                @switch($product['key'])
                                    @case('pos')
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 14h28v22H18z"/><path d="M14 50h36l-4-14H18z"/><path d="M25 43h14"/><path d="M26 22h12"/></svg>
                                        @break
                                    @case('property')
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 31 32 15l20 16"/><path d="M18 29v22h28V29"/><path d="M27 51V38h10v13"/><path d="M24 28h4"/><path d="M36 28h4"/></svg>
                                        @break
                                    @case('school')
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 25 32 14l22 11-22 11z"/><path d="M18 31v12c4 5 24 5 28 0V31"/><path d="M54 25v18"/><path d="M50 45h8"/></svg>
                                        @break
                                    @case('itinerary')
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 12h28v40H18z"/><path d="M25 22h14"/><path d="M25 31h14"/><path d="M25 40h8"/><path d="m42 18 7-7"/><path d="m49 11 3 8"/></svg>
                                        @break
                                    @case('manufacturing')
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 47h40"/><path d="M16 47V29l10 7V29l10 7V22h12v25"/><path d="M40 22V12h8v10"/><path d="M21 42h4"/><path d="M33 42h4"/></svg>
                                        @break
                                    @default
                                        <svg width="48" height="48" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 16h16v16H16z"/><path d="M32 16h16v16H32z"/><path d="M16 32h16v16H16z"/><path d="M32 32h16v16H32z"/></svg>
                                @endswitch
                            </span>
                            <span class="tiwi-zoho-copy">
                                <strong>{{ $product['display_name'] }}</strong>
                                <small>{{ $product['description'] }}</small>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-slate-200 bg-[#fffaf2] py-20">
    <div class="tw-container grid items-center gap-12 lg:grid-cols-[1fr_.9fr]">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-tiwi-red">All-in-one suite</p>
            <h2 class="mt-4 text-5xl font-black leading-tight tracking-[-.05em] text-slate-950 md:text-6xl">Tiwi One</h2>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-700">
                Run your product catalogue, CMS pages, blog content, SEO metadata, homepage sections, and contact leads from one Laravel dashboard.
            </p>
            <a href="{{ route('pricing') }}" class="mt-8 inline-flex min-h-12 items-center gap-2 rounded-sm bg-tiwi-red px-7 text-sm font-black uppercase tracking-wide text-white hover:bg-red-700">
                View pricing <span class="text-xl">&rsaquo;</span>
            </a>
        </div>
        <blockquote class="border-l-[6px] border-tiwi-red bg-white p-9 shadow-zoho">
            <p class="text-2xl leading-10 tracking-[-.02em] text-slate-950">
                "Tiwi gives every business module a clear home, while each specialist system remains free to grow independently."
            </p>
            <cite class="mt-6 block text-sm font-black not-italic uppercase tracking-[.14em] text-slate-500">Tiwi implementation team</cite>
        </blockquote>
    </div>
</section>

<section class="bg-[#111820] py-20 text-white">
    <div class="tw-container grid gap-14 lg:grid-cols-[390px_1fr]">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-slate-400">Module Directory</p>
            <h2 class="mt-5 text-4xl font-black leading-tight tracking-[-.045em] md:text-5xl">Choose the system your team needs next.</h2>
            <p class="mt-5 text-lg leading-8 text-slate-400">
                Each product can be activated, described, priced, and linked to its own external application from the admin dashboard.
            </p>
        </div>

        <div class="space-y-4 border-t border-slate-700 pt-6">
            @foreach($featuredProducts as $product)
                <a href="{{ route('modules.index') }}" class="group grid min-h-[90px] grid-cols-[64px_1fr_24px] items-center gap-6 rounded-2xl border border-[#303945] bg-[#1f2630] px-5 py-4 transition hover:border-slate-500 hover:bg-[#252d38]">
                    <span class="z-dark-icon {{ $product['accent'] }}" data-symbol="{{ Str::of($product['name'])->explode(' ')->map(fn ($word) => Str::substr($word, 0, 1))->take(3)->join('') }}"></span>
                    <span>
                        <strong class="block text-xl font-black leading-tight text-white">{{ $product['name'] }}</strong>
                        <small class="mt-1 block text-lg text-slate-400">{{ $product['description'] }}</small>
                    </span>
                    <span class="text-3xl text-slate-500 transition group-hover:translate-x-1 group-hover:text-white">&rsaquo;</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-20">
    <div class="tw-container">
        <div class="max-w-3xl">
            <h2 class="text-4xl font-black leading-tight tracking-[-.045em] text-slate-950 md:text-6xl">The core features that keep Tiwi useful</h2>
            <p class="mt-5 text-lg leading-8 text-slate-700">
                Built around the website and dashboard work a software brand needs before each product is opened.
            </p>
        </div>
        <div class="mt-10 grid border-l border-t border-slate-200 md:grid-cols-2 lg:grid-cols-4">
            <article class="border-b border-r border-slate-200 p-8">
                <h3 class="text-xl font-black text-slate-950">Admin dashboard</h3>
                <p class="mt-4 leading-7 text-slate-600">Manage products, CMS pages, blog posts, contact messages, and homepage content.</p>
            </article>
            <article class="border-b border-r border-slate-200 p-8">
                <h3 class="text-xl font-black text-slate-950">SEO-ready content</h3>
                <p class="mt-4 leading-7 text-slate-600">Each product, page, and blog post supports clean slugs, meta titles, and descriptions.</p>
            </article>
            <article class="border-b border-r border-slate-200 p-8">
                <h3 class="text-xl font-black text-slate-950">External module links</h3>
                <p class="mt-4 leading-7 text-slate-600">Send visitors to separately built POS, property, school, itinerary, or manufacturing systems.</p>
            </article>
            <article class="border-b border-r border-slate-200 p-8">
                <h3 class="text-xl font-black text-slate-950">Responsive frontend</h3>
                <p class="mt-4 leading-7 text-slate-600">Public pages and admin screens are structured for mobile and desktop use.</p>
            </article>
        </div>
    </div>
</section>

<section class="bg-slate-950 py-14 text-white">
    <div class="tw-container grid text-center sm:grid-cols-2 lg:grid-cols-4">
        <div class="border-b border-white/15 p-6 sm:border-r lg:border-b-0">
            <strong class="block text-5xl font-black">5</strong>
            <span class="mt-3 block text-xs font-black uppercase tracking-[.16em] text-slate-300">Marketed products</span>
        </div>
        <div class="border-b border-white/15 p-6 lg:border-b-0 lg:border-r">
            <strong class="block text-5xl font-black">CMS</strong>
            <span class="mt-3 block text-xs font-black uppercase tracking-[.16em] text-slate-300">Editable pages</span>
        </div>
        <div class="border-b border-white/15 p-6 sm:border-r sm:border-b-0">
            <strong class="block text-5xl font-black">SEO</strong>
            <span class="mt-3 block text-xs font-black uppercase tracking-[.16em] text-slate-300">Friendly URLs</span>
        </div>
        <div class="p-6">
            <strong class="block text-5xl font-black">MySQL</strong>
            <span class="mt-3 block text-xs font-black uppercase tracking-[.16em] text-slate-300">Laravel backend</span>
        </div>
    </div>
</section>

@if($posts->isNotEmpty())
<section class="bg-white py-16">
    <div class="tw-container">
        <div class="flex flex-col gap-4 border-b border-slate-200 pb-7 md:flex-row md:items-center md:justify-between">
            <h2 class="text-base font-black uppercase tracking-[.12em] text-slate-950">News and updates</h2>
            <a href="{{ route('blog.index') }}" class="text-sm font-black uppercase tracking-[.12em] text-tiwi-blue">Read the blog <span class="text-xl">&rsaquo;</span></a>
        </div>
        <div class="mt-8 grid gap-px border border-slate-200 bg-slate-200 md:grid-cols-3">
            @foreach($posts as $post)
                <article class="bg-white p-8">
                    <h3 class="text-xl font-black leading-tight text-slate-950">{{ $post->title }}</h3>
                    <p class="mt-4 leading-7 text-slate-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('blog.show', $post) }}" class="mt-6 inline-flex font-black text-tiwi-blue">Read more</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="border-t border-slate-200 bg-white py-20 text-center">
    <div class="tw-container">
        <h2 class="mx-auto max-w-3xl text-5xl font-black leading-tight tracking-[-.05em] text-slate-950 md:text-6xl">Ready to do your best work?</h2>
        <p class="mx-auto mt-5 max-w-xl text-lg leading-8 text-slate-700">Let Tiwi become the main entry point for your business software products.</p>
        <a href="{{ route('contact') }}" class="mt-9 inline-flex min-h-[64px] items-center gap-3 rounded-sm bg-tiwi-red px-10 text-base font-black uppercase tracking-wide text-white transition hover:bg-red-700">
            Sign up now
            <span class="text-2xl">&rsaquo;</span>
        </a>
    </div>
</section>
@endsection
