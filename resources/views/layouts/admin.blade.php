<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | Tiwi</title>
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('admin.dashboard') }}">Tiwi Admin</a>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.modules.index') }}">Modules</a>
            <a href="{{ route('admin.pages.index') }}">Pages</a>
            <a href="{{ route('admin.blog-posts.index') }}">Blog Posts</a>
            <a href="{{ route('admin.contact-messages.index') }}">Contact Messages</a>
            <a href="{{ route('admin.homepage-sections.index') }}">Settings</a>
            <a href="{{ route('home') }}">View Website</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="button ghost" type="submit">Logout</button>
            </form>
        </aside>
        <main class="admin-main">
            <div class="admin-top">
                <div>
                    <p class="eyebrow">Tiwi Dashboard</p>
                    <h1>@yield('title', 'Admin')</h1>
                </div>
                <span>{{ auth()->user()->name }}</span>
            </div>
            @if(session('status')) <div class="notice">{{ session('status') }}</div> @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
