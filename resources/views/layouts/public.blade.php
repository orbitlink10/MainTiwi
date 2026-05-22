<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? 'Tiwi | Business Software Modules' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Tiwi is a marketing website and dashboard for connected business software modules.' }}">
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav">
            <a class="brand" href="{{ route('home') }}">Tiwi</a>
            <nav class="nav-links">
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('modules.index') }}">Solutions</a>
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a class="button secondary" href="{{ route('login') }}">Admin</a>
            </nav>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <h3>Tiwi</h3>
                <p>One public website and dashboard for connected business software modules.</p>
            </div>
            <div>
                <h3>Modules</h3>
                @foreach(\App\Models\Module::active()->orderBy('name')->take(7)->get() as $footerModule)
                    <a href="{{ route('modules.show', $footerModule) }}">{{ $footerModule->name }}</a>
                @endforeach
            </div>
            <div>
                <h3>Company</h3>
                <a href="{{ route('about') }}">About Tiwi</a>
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
