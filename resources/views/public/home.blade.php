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
    .home-products {
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        padding: 0 0 76px;
        font-family: Inter, ui-sans-serif, system-ui, sans-serif;
    }

    .home-products-panel {
        width: min(1032px, calc(100% - 48px));
        margin: 0 auto;
        padding: 0 0 8px;
        background: #fff;
    }

    .home-products-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        min-height: 106px;
        border-bottom: 1px solid #dfe3ea;
        margin-bottom: 76px;
    }

    .home-products-head h2 {
        margin: 0;
        color: #0f172a;
        font-size: 20px;
        font-weight: 600;
        line-height: 1;
        letter-spacing: .02em;
        text-transform: uppercase;
    }

    .home-products-head a {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        color: #0067b8;
        font-size: 20px;
        font-weight: 500;
        line-height: 1;
        letter-spacing: .08em;
        text-transform: uppercase;
        text-decoration: none;
        white-space: nowrap;
    }

    .home-products-head a span {
        display: inline-block;
        color: #0067b8;
        font-size: 34px;
        font-weight: 300;
        line-height: .45;
        transform: translateY(-1px);
    }

    .home-products-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 76px;
        row-gap: 62px;
    }

    .home-product {
        display: grid;
        grid-template-columns: 50px minmax(0, 1fr);
        align-items: start;
        gap: 18px;
        color: #111;
        text-decoration: none;
        min-width: 0;
    }

    .home-product:hover .home-product-title {
        color: #0067b8;
    }

    .home-product-icon {
        width: 50px;
        height: 50px;
        color: #2b78c2;
    }

    .home-product-icon.green {
        color: #00a65a;
    }

    .home-product-icon.amber {
        color: #f5a400;
    }

    .home-product-icon svg {
        display: block;
        width: 50px;
        height: 50px;
        fill: none;
        stroke: currentColor;
        stroke-width: 3.2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .home-product-icon svg * {
        fill: none;
        stroke: currentColor;
    }

    .home-product-title {
        display: block;
        margin: 0 0 12px;
        color: #000;
        font-size: 32px;
        font-weight: 400;
        line-height: 1.1;
        letter-spacing: 0;
        transition: color .15s ease;
    }

    .home-product-description {
        display: block;
        color: #111;
        font-size: 21px;
        font-weight: 400;
        line-height: 1.28;
        letter-spacing: 0;
    }

    @media (max-width: 1080px) {
        .home-products-panel {
            width: min(820px, calc(100% - 40px));
        }

        .home-products-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 58px;
        }
    }

    @media (max-width: 680px) {
        .home-products {
            padding-bottom: 48px;
        }

        .home-products-panel {
            width: calc(100% - 32px);
        }

        .home-products-head {
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
            gap: 16px;
            min-height: 118px;
            margin-bottom: 40px;
        }

        .home-products-head h2,
        .home-products-head a {
            font-size: 18px;
        }

        .home-products-grid {
            grid-template-columns: 1fr;
            row-gap: 36px;
        }

        .home-product {
            grid-template-columns: 46px minmax(0, 1fr);
            gap: 18px;
        }

        .home-product-icon,
        .home-product-icon svg {
            width: 46px;
            height: 46px;
        }

        .home-product-title {
            font-size: 28px;
        }

        .home-product-description {
            font-size: 18px;
        }
    }
</style>

<section class="z-hero">
    <div class="tw-container">
        <h1>Your life's work,<br>powered by our life's work</h1>
        <p class="z-lead">
            A unique and powerful software suite to transform the way you work.<br>
            Designed for businesses of all sizes, built by a company that values your privacy.
        </p>
        <a href="{{ route('contact') }}" class="z-red-cta">Get started for free <span>&rsaquo;</span></a>
    </div>
</section>

<section class="home-products">
    <div class="home-products-panel">
        <div class="home-products-head">
            <h2>Featured Apps</h2>
            <a href="{{ route('modules.index') }}">Explore all products <span>&rsaquo;</span></a>
        </div>

        <div class="home-products-grid">
            @foreach($featuredProducts as $product)
                <a href="{{ route('modules.index') }}" class="home-product">
                    <span class="home-product-icon {{ $product['accent'] }}" aria-hidden="true">
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
                    <span>
                        <strong class="home-product-title">{{ $product['display_name'] }}</strong>
                        <small class="home-product-description">{{ $product['description'] }}</small>
                    </span>
                </a>
            @endforeach
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
