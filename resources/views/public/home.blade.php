@extends('layouts.public')

@section('content')
@php
    $featuredProducts = [
        [
            'name' => 'POS',
            'description' => 'Fast checkout, inventory, receipts, branches, and sales reporting for retail teams.',
            'icon' => 'POS',
            'accent' => 'text-blue-600',
        ],
        [
            'name' => 'Property Management System',
            'description' => 'Manage units, tenants, rent collection, service requests, and property records.',
            'icon' => 'PMS',
            'accent' => 'text-emerald-600',
        ],
        [
            'name' => 'School Management System',
            'description' => 'Admissions, learners, fees, classes, exams, and communication in one school platform.',
            'icon' => 'SMS',
            'accent' => 'text-amber-600',
        ],
        [
            'name' => 'Itinerary Builder',
            'description' => 'Build polished travel plans, quotes, day-by-day routes, and shareable proposals.',
            'icon' => 'TRP',
            'accent' => 'text-indigo-600',
        ],
        [
            'name' => 'Manufacturing Management System',
            'description' => 'Plan production, materials, work orders, costing, and finished-goods movement.',
            'icon' => 'MFG',
            'accent' => 'text-red-600',
        ],
    ];

@endphp

<section class="zoho-line-bg border-b border-slate-200">
    <div class="tw-container pb-24 pt-16 text-center lg:pb-28 lg:pt-20">
        <p class="text-sm font-semibold tracking-[.2em] text-slate-600">Tiwi Business Software Suite</p>
        <h1 class="mx-auto mt-8 max-w-5xl text-balance text-5xl font-black leading-[1.02] tracking-[-.055em] text-slate-950 md:text-7xl lg:text-[88px]">
            Your business work, powered by Tiwi.
        </h1>
        <p class="mx-auto mt-7 max-w-3xl text-pretty text-xl leading-8 text-slate-700">
            One polished software suite for POS, property management, school operations, itinerary building, and manufacturing management.
        </p>
        <div class="mt-9 flex justify-center">
            <a href="{{ route('contact') }}" class="inline-flex min-h-[74px] items-center gap-3 rounded-sm bg-tiwi-red px-11 text-lg font-black uppercase tracking-wide text-white transition hover:bg-red-700">
                Get started for free
                <span class="text-3xl leading-none">&rsaquo;</span>
            </a>
        </div>
    </div>
</section>

<section class="-mt-16 bg-white pb-16">
    <div class="tw-container">
        <div class="grid gap-8 rounded-xl border border-slate-200 bg-white p-6 shadow-zoho xl:grid-cols-[560px_1fr] xl:p-6">
            <aside class="relative flex min-h-[500px] flex-col items-center justify-center overflow-hidden rounded-lg bg-gradient-to-br from-[#2d0b66] via-[#53158a] to-[#3b0764] px-8 py-12 text-center text-white">
                <div class="absolute inset-0 opacity-25" style="background-image:linear-gradient(rgba(255,255,255,.15) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.15) 1px, transparent 1px); background-size:52px 52px;"></div>
                <div class="relative mb-9 grid h-24 w-24 place-items-center rounded-2xl border border-white/20 bg-[#1f063f] text-3xl font-black shadow-[0_0_45px_rgba(56,189,248,.45)] -rotate-6">Ti</div>
                <h2 class="relative text-5xl font-medium leading-tight tracking-[-.045em] text-violet-100">
                    Introducing<br>Tiwi One
                </h2>
                <p class="relative mt-7 max-w-md text-lg leading-8 text-white">
                    A main website for product discovery, SEO pages, enquiries, and external system access.
                </p>
                <a href="{{ route('modules.index') }}" class="relative mt-10 inline-flex min-h-16 items-center gap-3 rounded-full border-2 border-violet-300 px-9 text-sm font-black uppercase tracking-[.14em] text-white transition hover:bg-white hover:text-violet-950">
                    Explore Tiwi modules
                    <span class="text-2xl">&rsaquo;</span>
                </a>
            </aside>

            <div class="px-2 py-5 md:px-5 xl:py-10">
                <div class="flex flex-col gap-5 border-b border-slate-200 pb-8 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-base font-black uppercase tracking-[.1em] text-slate-950">Featured products</h2>
                    <a href="{{ route('modules.index') }}" class="inline-flex items-center gap-3 text-sm font-black uppercase tracking-[.1em] text-tiwi-blue">
                        Explore all products
                        <span class="text-2xl leading-none">&rsaquo;</span>
                    </a>
                </div>

                <div class="mt-12 grid gap-x-10 gap-y-12 md:grid-cols-2 2xl:grid-cols-3">
                    @foreach($featuredProducts as $product)
                        <article class="grid min-w-0 grid-cols-[54px_1fr] gap-5">
                            <span class="{{ $product['accent'] }} grid h-12 w-12 place-items-center rounded-xl border-2 border-current bg-white text-[11px] font-black">
                                {{ $product['icon'] }}
                            </span>
                            <span class="min-w-0">
                                <strong class="block text-2xl font-medium leading-tight tracking-[-.02em] text-black">{{ $product['name'] }}</strong>
                                <small class="mt-3 block text-[16px] leading-6 text-slate-950">{{ $product['description'] }}</small>
                            </span>
                        </article>
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
                    <span class="{{ $product['accent'] }} grid h-14 w-14 place-items-center rounded-xl bg-white/5 text-[11px] font-black ring-1 ring-white/10">{{ $product['icon'] }}</span>
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
