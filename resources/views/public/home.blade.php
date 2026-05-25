@extends('layouts.public')

@section('content')
@php
    $featuredProducts = [
        [
            'name' => 'POS',
            'description' => 'Complete point-of-sale software for retail, inventory, branches, and sales reporting.',
            'key' => 'pos',
            'accent' => 'blue',
        ],
        [
            'name' => 'Property Management System',
            'description' => 'Manage tenants, units, rent collection, service requests, and property records.',
            'key' => 'property',
            'accent' => 'green',
        ],
        [
            'name' => 'School Management System',
            'description' => 'Organize learners, fees, classes, exams, admissions, and school communication.',
            'key' => 'school',
            'accent' => 'blue',
        ],
        [
            'name' => 'Itinerary Builder',
            'description' => 'Build travel plans, quotes, day-by-day routes, and polished client proposals.',
            'key' => 'itinerary',
            'accent' => 'amber',
        ],
        [
            'name' => 'Manufacturing Management System',
            'description' => 'Plan production, materials, work orders, costing, and finished-goods movement.',
            'key' => 'manufacturing',
            'accent' => 'green',
        ],
        [
            'name' => 'Tiwi One',
            'description' => 'A unified business software suite for product discovery, access, and growth.',
            'key' => 'suite',
            'accent' => 'blue',
        ],
    ];

@endphp

<section class="tiwi-products-hero zoho-line-bg">
    <div class="tw-container">
        <div class="tiwi-products-panel">
            @foreach($featuredProducts as $product)
                <a href="{{ route('modules.index') }}" class="tiwi-product-card">
                    <span class="tiwi-product-icon {{ $product['accent'] }}" aria-hidden="true">
                        @switch($product['key'])
                            @case('pos')
                                <svg viewBox="0 0 64 64"><path d="M18 14h28v22H18z"/><path d="M14 50h36l-4-14H18z"/><path d="M25 43h14"/><path d="M26 22h12"/></svg>
                                @break
                            @case('property')
                                <svg viewBox="0 0 64 64"><path d="M12 31 32 15l20 16"/><path d="M18 29v22h28V29"/><path d="M27 51V38h10v13"/><path d="M24 28h4"/><path d="M36 28h4"/></svg>
                                @break
                            @case('school')
                                <svg viewBox="0 0 64 64"><path d="M10 25 32 14l22 11-22 11z"/><path d="M18 31v12c4 5 24 5 28 0V31"/><path d="M54 25v18"/><path d="M50 45h8"/></svg>
                                @break
                            @case('itinerary')
                                <svg viewBox="0 0 64 64"><path d="M18 12h28v40H18z"/><path d="M25 22h14"/><path d="M25 31h14"/><path d="M25 40h8"/><path d="m42 18 7-7"/><path d="m49 11 3 8"/></svg>
                                @break
                            @case('manufacturing')
                                <svg viewBox="0 0 64 64"><path d="M12 47h40"/><path d="M16 47V29l10 7V29l10 7V22h12v25"/><path d="M40 22V12h8v10"/><path d="M21 42h4"/><path d="M33 42h4"/></svg>
                                @break
                            @default
                                <svg viewBox="0 0 64 64"><path d="M16 16h16v16H16z"/><path d="M32 16h16v16H32z"/><path d="M16 32h16v16H16z"/><path d="M32 32h16v16H32z"/></svg>
                        @endswitch
                    </span>
                    <span class="tiwi-product-copy">
                        <strong>{{ $product['name'] }}</strong>
                        <small>{{ $product['description'] }}</small>
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
