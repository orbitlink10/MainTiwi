<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | Tiwi</title>
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">Tiwi Admin</a>

            <nav class="admin-nav" aria-label="Admin navigation">
                <a class="admin-nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v4"/><path d="m18.4 5.6-2.8 2.8"/><path d="M21 12h-4"/><path d="m18.4 18.4-2.8-2.8"/><path d="M12 17v4"/><path d="m8.4 15.6-2.8 2.8"/><path d="M7 12H3"/><path d="m8.4 8.4-2.8-2.8"/><circle cx="12" cy="12" r="3"/></svg></span>
                    <span>Dashboard</span>
                </a>
                <a class="admin-nav-link" href="#">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19V5"/><path d="M4 19h16"/><path d="m7 14 4-4 3 3 5-6"/></svg></span>
                    <span>Analytics</span>
                </a>

                <span class="admin-nav-heading">Content Management</span>

                <a class="admin-nav-link @if(request()->routeIs('admin.homepage-sections.*') || request()->routeIs('admin.homepage-content.*')) active @endif" href="{{ route('admin.homepage-content.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h10"/></svg></span>
                    <span>Homepage Content</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.pages.*')) active @endif" href="{{ route('admin.pages.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v6h5"/><path d="M9 14h7"/><path d="M9 18h5"/></svg></span>
                    <span>Pages</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.modules.*')) active @endif" href="{{ route('admin.modules.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h6v6H4z"/><path d="M14 4h6v6h-6z"/><path d="M4 14h6v6H4z"/><path d="M14 14h6v6h-6z"/></svg></span>
                    <span>Products</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.blog-posts.*')) active @endif" href="{{ route('admin.blog-posts.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"/><path d="M8 8h8"/><path d="M8 12h8"/><path d="M8 16h5"/></svg></span>
                    <span>Blog Posts</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.contact-messages.*')) active @endif" href="{{ route('admin.contact-messages.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/></svg></span>
                    <span>Contact Messages</span>
                </a>

                <span class="admin-nav-heading">Admin Panel</span>

                <a class="admin-nav-link" href="{{ route('home') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 3h7v7"/><path d="M10 14 21 3"/><path d="M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/></svg></span>
                    <span>View Website</span>
                </a>
            </nav>

            <form class="admin-logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="button ghost" type="submit">Logout</button>
            </form>
        </aside>
        <main class="admin-main">
            <div class="admin-top">
                <div>
                    <p class="admin-pill">Admin Section</p>
                    <h1>@yield('title', 'Admin')</h1>
                </div>
                <span class="admin-user">{{ auth()->user()->name }}</span>
            </div>
            @if(session('status')) <div class="notice">{{ session('status') }}</div> @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
