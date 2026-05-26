<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? 'Tiwi | Business Management Software' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Tiwi delivers practical business software modules for POS, property management, school management, itinerary building, and manufacturing management.' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        },
                        colors: {
                            tiwi: {
                                red: '#ee0011',
                                blue: '#0067b8',
                                ink: '#111827',
                                soft: '#f7fafc',
                            },
                        },
                        boxShadow: {
                            zoho: '0 18px 45px rgba(15, 23, 42, .08)',
                        },
                    },
                },
            };
        </script>
        <style>
            .tw-container { width: calc(100% - 32px); max-width: 1180px; margin-left: auto; margin-right: auto; }
            .zoho-line-bg {
                background-image:
                    repeating-linear-gradient(60deg, rgba(37, 99, 235, .08) 0 1px, transparent 1px 18px),
                    linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
            }
        </style>
    @endif
    <style>
        .site-nav-item{position:relative}
        .site-nav-trigger{display:inline-flex;align-items:center;gap:6px;min-height:44px}
        .site-nav-chevron{width:16px;height:16px;transition:transform .15s ease}
        .site-nav-item:hover .site-nav-chevron,.site-nav-item:focus-within .site-nav-chevron{transform:rotate(180deg)}
        .site-nav-dropdown{position:absolute;left:50%;top:100%;z-index:60;min-width:230px;transform:translate(-50%,8px);border:1px solid #e2e8f0;border-radius:12px;background:#fff;padding:8px;box-shadow:0 18px 45px rgba(15,23,42,.12);opacity:0;visibility:hidden;transition:opacity .15s ease,transform .15s ease,visibility .15s ease}
        .site-nav-item:hover .site-nav-dropdown,.site-nav-item:focus-within .site-nav-dropdown{opacity:1;visibility:visible;transform:translate(-50%,0)}
        .site-nav-dropdown a{display:block;border-radius:8px;padding:10px 12px;color:#0f172a;font-size:15px;line-height:1.35;text-decoration:none;white-space:nowrap}
        .site-nav-dropdown a:hover{background:#f8fafc;color:#ee0011}
        .site-language{display:flex;align-items:center;gap:8px;color:#0f172a;font-size:15px;font-weight:600}
        .site-language-label{white-space:nowrap}
        .site-language .goog-te-gadget{font-family:Inter,ui-sans-serif,system-ui,sans-serif!important;font-size:0!important;color:transparent!important}
        .site-language .goog-te-combo{min-height:42px;max-width:160px;border:1px solid #e2e8f0;border-radius:10px;background:#fff;color:#0f172a;padding:0 10px;font:inherit;font-size:14px}
        .site-language .goog-logo-link,.site-language .goog-te-gadget span{display:none!important}
        body > .skiptranslate{display:none!important}
        body{top:0!important}
    </style>
</head>
<body class="font-sans">
    @php
        $headerSection = \App\Models\HomepageSection::active()->where('key', 'header_navigation')->first();
        $headerMenuItems = $headerSection?->payload['menu_items'] ?? [
            ['label' => 'Products', 'url' => route('modules.index')],
            ['label' => 'Customers', 'url' => route('about')],
            ['label' => 'Partners', 'url' => route('contact')],
            ['label' => 'Resources', 'url' => route('blog.index')],
        ];
        $headerLogo = $headerSection?->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($headerSection->image)
            ? route('media.show', ['path' => $headerSection->image])
            : null;
        $menuUrl = function ($url) {
            if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://') || str_starts_with($url, '#')) {
                return $url;
            }

            return url($url);
        };
    @endphp
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="tw-container flex min-h-20 items-center justify-between gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Tiwi home">
                @if($headerLogo)
                    <img src="{{ $headerLogo }}" alt="{{ $headerSection->heading ?: 'Tiwi' }}" class="block max-h-14 max-w-[190px] object-contain" onerror="this.classList.add('hidden');this.nextElementSibling.classList.remove('hidden');">
                    <span class="relative hidden h-12 w-24">
                        <span class="absolute left-0 top-2 h-9 w-9 rotate-[-9deg] rounded-md border-[5px] border-[#ee0011] bg-white"></span>
                        <span class="absolute left-7 top-2 h-9 w-9 rotate-[14deg] rounded-md border-[5px] border-[#16a34a] bg-white"></span>
                        <span class="absolute left-14 top-2 h-9 w-9 rotate-[-5deg] rounded-md border-[5px] border-[#2563eb] bg-white"></span>
                        <span class="absolute left-[84px] top-2 h-9 w-9 rotate-[1deg] rounded-md border-[5px] border-[#f59e0b] bg-white"></span>
                        <span class="absolute left-8 top-11 text-[10px] font-black uppercase tracking-[.45em] text-slate-950">Tiwi</span>
                    </span>
                @else
                    <span class="relative block h-12 w-24">
                        <span class="absolute left-0 top-2 h-9 w-9 rotate-[-9deg] rounded-md border-[5px] border-[#ee0011] bg-white"></span>
                        <span class="absolute left-7 top-2 h-9 w-9 rotate-[14deg] rounded-md border-[5px] border-[#16a34a] bg-white"></span>
                        <span class="absolute left-14 top-2 h-9 w-9 rotate-[-5deg] rounded-md border-[5px] border-[#2563eb] bg-white"></span>
                        <span class="absolute left-[84px] top-2 h-9 w-9 rotate-[1deg] rounded-md border-[5px] border-[#f59e0b] bg-white"></span>
                        <span class="absolute left-8 top-11 text-[10px] font-black uppercase tracking-[.45em] text-slate-950">Tiwi</span>
                    </span>
                @endif
            </a>

            <nav class="hidden items-center gap-10 text-[17px] font-medium text-slate-950 lg:flex">
                @foreach($headerMenuItems as $menuItem)
                    @php($children = collect($menuItem['children'] ?? [])->filter(fn ($child) => filled($child['label'] ?? null) && filled($child['url'] ?? null)))
                    <div class="site-nav-item">
                        <a class="site-nav-trigger transition hover:text-tiwi-red" href="{{ $menuUrl($menuItem['url'] ?? '#') }}">
                            {{ $menuItem['label'] ?? 'Menu' }}
                            @if($children->isNotEmpty())
                                <svg class="site-nav-chevron" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m5 7 5 5 5-5"/></svg>
                            @endif
                        </a>
                        @if($children->isNotEmpty())
                            <div class="site-nav-dropdown">
                                @foreach($children as $child)
                                    <a href="{{ $menuUrl($child['url']) }}">{{ $child['label'] }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>

            <div class="hidden items-center gap-6 text-[17px] font-medium lg:flex">
                <div class="site-language">
                    <span class="site-language-label">Language</span>
                    <div id="google_translate_element"></div>
                </div>
                <a class="text-slate-950 transition hover:text-tiwi-red" href="{{ route('login') }}">Sign In</a>
                <a class="rounded border border-tiwi-red px-6 py-3 text-tiwi-red transition hover:bg-tiwi-red hover:text-white" href="{{ route('contact') }}">Sign Up</a>
            </div>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="border-t border-slate-200 bg-[#f7f7f7]">
        <div class="tw-container grid gap-10 py-14 md:grid-cols-2 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">
            <div>
                <span class="text-3xl font-black tracking-tight text-slate-950">Tiwi<span class="text-tiwi-red">.</span></span>
                <p class="mt-4 max-w-sm text-sm leading-7 text-slate-600">
                    The main marketing website and access hub for modular business software systems.
                </p>
                <a class="mt-6 inline-flex rounded border border-slate-950 px-5 py-2.5 text-sm font-bold text-slate-950 transition hover:bg-slate-950 hover:text-white" href="{{ route('contact') }}">Talk to us</a>
            </div>

            <div>
                <h4 class="mb-4 text-xs font-black uppercase tracking-[.16em] text-slate-950">Solutions</h4>
                <div class="space-y-2">
                    @foreach(['POS', 'Property Management System', 'School Management System', 'Itinerary Builder', 'Manufacturing Management System'] as $footerProduct)
                        <a class="block text-sm text-slate-600 hover:text-tiwi-red" href="{{ route('modules.index') }}">{{ $footerProduct }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="mb-4 text-xs font-black uppercase tracking-[.16em] text-slate-950">Company</h4>
                <div class="space-y-2 text-sm text-slate-600">
                    <a class="block hover:text-tiwi-red" href="{{ route('about') }}">About Tiwi</a>
                    <a class="block hover:text-tiwi-red" href="{{ route('pricing') }}">Pricing</a>
                    <a class="block hover:text-tiwi-red" href="{{ route('blog.index') }}">Blog</a>
                    <a class="block hover:text-tiwi-red" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>

            <div>
                <h4 class="mb-4 text-xs font-black uppercase tracking-[.16em] text-slate-950">Resources</h4>
                <div class="space-y-2 text-sm text-slate-600">
                    <a class="block hover:text-tiwi-red" href="{{ route('modules.index') }}">All Products</a>
                    <a class="block hover:text-tiwi-red" href="{{ route('contact') }}">Request a Demo</a>
                    <a class="block hover:text-tiwi-red" href="{{ route('login') }}">Client Login</a>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-200 py-5">
            <div class="tw-container flex flex-col justify-between gap-3 text-sm text-slate-500 md:flex-row">
                <span>&copy; {{ date('Y') }} Tiwi Software. All rights reserved.</span>
                <span class="flex gap-6"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></span>
            </div>
        </div>
    </footer>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'sw,luo,so,om',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
