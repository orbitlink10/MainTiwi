<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? 'Tiwi | Business Management Software' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Tiwi delivers practical business software modules for teams managing sales, schools, hospitals, rentals, travel, hotspot billing, and manufacturing.' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="container nav">
            <a class="brand" href="{{ route('home') }}">
                Tiwi<span class="brand-dot"></span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('modules.index') }}">Solutions</a>
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>

            <div class="nav-cta">
                <a class="btn btn-ghost-dark btn-sm" href="{{ route('login') }}">Sign in</a>
                <a class="btn btn-primary btn-sm" href="{{ route('modules.index') }}">Get Started</a>
            </div>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-body">
                <div>
                    <span class="footer-brand-name">Tiwi<span style="color:var(--brand)">.</span></span>
                    <p class="footer-brand-desc">
                        Integrated business management software for East African enterprises.
                        One platform, seven powerful systems.
                    </p>
                    <a class="btn btn-outline btn-sm" href="{{ route('contact') }}">Talk to us</a>
                </div>

                <div class="footer-col">
                    <h4>Solutions</h4>
                    @foreach(\App\Models\Module::active()->orderBy('name')->take(7)->get() as $footerModule)
                        <a href="{{ route('modules.show', $footerModule) }}">{{ $footerModule->name }}</a>
                    @endforeach
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <a href="{{ route('about') }}">About Tiwi</a>
                    <a href="{{ route('pricing') }}">Pricing</a>
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>

                <div class="footer-col">
                    <h4>Resources</h4>
                    <a href="{{ route('modules.index') }}">All Solutions</a>
                    <a href="{{ route('contact') }}">Request a Demo</a>
                    <a href="{{ route('contact') }}">Support</a>
                    <a href="{{ route('login') }}">Client Login</a>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} Tiwi Software. All rights reserved.</span>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
