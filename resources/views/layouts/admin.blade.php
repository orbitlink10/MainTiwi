<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | Tiwi</title>
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
    <style>
        .admin-body{margin:0;background:#f3f7fc;color:#102033;font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
        .admin-body .admin-shell{display:grid;grid-template-columns:292px minmax(0,1fr);min-height:100vh;background:#f4f8fd}
        .admin-body .admin-sidebar{position:sticky;top:0;height:100vh;overflow:auto;padding:22px 18px;background:#eef4fb;border-right:1px solid #d8e4f2}
        .admin-body .admin-brand{display:flex;align-items:center;min-height:56px;margin:0 0 24px;padding:0 18px;border:1px solid #d4e0ef;border-radius:14px;background:#fff;color:#263548;font-size:22px;font-weight:800;letter-spacing:-.035em;box-shadow:0 10px 26px rgba(31,53,84,.06)}
        .admin-body .admin-nav{display:grid;gap:5px}
        .admin-body .admin-nav-heading{display:block;margin:18px 8px 8px;color:#8ba0bb;font-size:12px;font-weight:800;letter-spacing:.18em;text-transform:uppercase}
        .admin-body .admin-nav-link{display:grid;grid-template-columns:38px minmax(0,1fr);align-items:center;gap:12px;min-height:46px;padding:4px 10px;border-radius:12px;color:#334f76;font-size:16px;font-weight:700;text-decoration:none}
        .admin-body .admin-nav-link:hover,.admin-body .admin-nav-link.active{background:#fff;color:#102033}
        .admin-body .admin-nav-icon{display:grid;place-items:center;width:38px;height:38px;border-radius:11px;background:#dfe9f6;color:#6f87a8}
        .admin-body .admin-nav-link.active .admin-nav-icon{background:#2d7ff0;color:#fff}
        .admin-body .admin-nav-icon svg{display:block;width:20px;height:20px;max-width:20px;max-height:20px;fill:none!important;stroke:currentColor!important;stroke-width:2.1;stroke-linecap:round;stroke-linejoin:round}
        .admin-body .admin-nav-icon svg *{fill:none!important;stroke:currentColor!important}
        .admin-body .admin-logout{margin-top:18px}
        .admin-body .admin-main{padding:28px 34px 42px;background:linear-gradient(120deg,#f8fbff 0,#edf5ff 100%)}
        .admin-body .admin-top{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;width:min(100%,1120px);margin:0 auto 20px}
        .admin-body .admin-pill{display:inline-flex;min-height:24px;align-items:center;padding:0 12px;margin:0 0 10px;border-radius:999px;background:#e3edf9;color:#415c7f;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}
        .admin-body .admin-top h1{margin:0;color:#101827;font-size:38px;line-height:1.04;font-weight:800;letter-spacing:-.045em}
        .admin-body .admin-user{color:#60748f;font-size:14px;font-weight:700}
        .admin-body .admin-card,.admin-body .content,.admin-body .section{width:min(100%,1120px);margin:0 auto 22px;overflow:hidden;border:1px solid #d8e4f2;border-radius:18px;background:#fff;box-shadow:0 16px 38px rgba(31,53,84,.06)}
        .admin-body .admin-card-head,.admin-body .section-head{display:flex;align-items:center;justify-content:space-between;gap:18px;padding:22px 26px;border-bottom:1px solid #dce7f4}
        .admin-body .admin-card-head h2,.admin-body .section-head h2{margin:0 0 4px;color:#061936;font-size:24px;font-weight:800;letter-spacing:-.035em}
        .admin-body .admin-card-head p{margin:0;color:#607a9f;font-size:15px;line-height:1.45}
        .admin-body .admin-form-section{padding:24px 26px 14px}
        .admin-body .form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
        .admin-body .field{display:grid;gap:8px;margin-bottom:16px}
        .admin-body label{color:#061936;font-size:14px;font-weight:800;letter-spacing:-.01em}
        .admin-body input,.admin-body textarea,.admin-body select{width:100%;min-height:46px;border:1px solid #cddcf0;border-radius:12px;background:#fff;color:#132744;padding:10px 14px;font:inherit;font-size:15px;line-height:1.45;box-shadow:none}
        .admin-body textarea{min-height:118px}
        .admin-body .admin-editor{min-height:190px}
        .admin-body input:focus,.admin-body textarea:focus,.admin-body select:focus{outline:0;border-color:#2d7ff0;box-shadow:0 0 0 3px rgba(45,127,240,.12)}
        .admin-body .admin-check{display:inline-flex;align-items:center;gap:10px}
        .admin-body .admin-check input{width:18px;min-height:18px}
        .admin-body .actions{display:flex;flex-wrap:wrap;gap:10px;padding:0 26px 24px}
        .admin-body .button{display:inline-flex;align-items:center;justify-content:center;min-height:38px;padding:0 18px;border:1px solid #2d7ff0;border-radius:999px;background:#2d7ff0;color:#fff;font-size:14px;font-weight:800;text-decoration:none}
        .admin-body .button.ghost,.admin-body .button.secondary{background:#f7faff;color:#334f76;border-color:#9fb2cf}
        .admin-body .stats{width:min(100%,1120px);margin:0 auto 22px;display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:12px}
        .admin-body .stat{min-height:92px;padding:18px;border:1px solid #d8e4f2;border-radius:16px;background:#fff;box-shadow:0 12px 28px rgba(31,53,84,.05)}
        .admin-body .stat span{color:#607a9f;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase}
        .admin-body .stat strong{display:block;margin-top:8px;color:#061936;font-size:30px;line-height:1}
        .admin-body .table{width:calc(100% - 32px);margin:16px;border:1px solid #dce7f4;border-radius:16px;border-collapse:separate;border-spacing:0;overflow:hidden;background:#fff}
        .admin-body .table th,.admin-body .table td{padding:13px 14px;border-bottom:1px solid #e1eaf5;color:#102846;font-size:14px;text-align:left;vertical-align:middle}
        .admin-body .table th{background:#f6f9fd;color:#5b7293;font-size:11px;font-weight:800;letter-spacing:.16em;text-transform:uppercase}
        .admin-body .table strong{display:block;color:#061936;font-size:15px;line-height:1.3}
        .admin-body .table small{display:block;margin-top:4px;color:#7890b0;font-size:12px;line-height:1.35}
        .admin-body .inline-actions{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
        .admin-body .admin-action,.admin-body .danger{display:inline-flex;align-items:center;justify-content:center;min-height:32px;padding:0 13px;border-radius:999px;font:inherit;font-size:13px;font-weight:800;text-decoration:none;cursor:pointer}
        .admin-body .admin-action{border:1px solid #f2bd63;background:#fff8ec;color:#d78a00}
        .admin-body .admin-action.preview{border-color:#00a4d6;background:#f2fcff;color:#008fc0}
        .admin-body .danger{border:1px solid #ff9aae;background:#fff0f3;color:#f2345a}
        .admin-body .admin-status{display:inline-flex;align-items:center;min-height:28px;padding:0 11px;border-radius:999px;background:#fff0f3;color:#f2345a;font-size:12px;font-weight:800}
        .admin-body .admin-status.active{background:#e8f8ef;color:#0f9f5b}
        .admin-body .notice{width:min(100%,1120px);margin:0 auto 16px;padding:12px 14px;border:1px solid #b9e6d0;border-radius:12px;background:#edfff6;color:#0b7444;font-size:14px;font-weight:800}
        .admin-body .pagination{padding:0 22px 22px;color:#60748f;font-size:14px}
        .admin-body .pagination nav{display:grid;gap:10px}
        .admin-body .pagination svg{width:18px!important;height:18px!important;max-width:18px!important;max-height:18px!important}
        .admin-body .pagination a,.admin-body .pagination span{font-size:14px}
        .admin-body .bulk-bar{display:flex;align-items:center;gap:12px;width:min(100%,1120px);margin:0 auto 14px;padding:0 16px}
        .admin-body .bulk-bar select{width:auto;min-width:170px}
        .admin-body .content-table{table-layout:fixed}
        .admin-body .content-table th,.admin-body .content-table td{padding:18px 16px}
        .admin-body .content-table tbody tr:nth-child(odd){background:#f7f7f7}
        .admin-body .content-table tbody tr:nth-child(even){background:#fff}
        .admin-body .content-table input[type="checkbox"]{width:18px;min-height:18px}
        .admin-body .content-table .check-col{width:46px}
        .admin-body .content-table .no-col{width:70px}
        .admin-body .content-table .image-col{width:230px}
        .admin-body .content-table .type-col{width:120px}
        .admin-body .content-table .action-col{width:170px}
        .admin-body .post-thumb{display:block;width:225px;max-width:100%;height:150px;border:1px solid #dce7f4;background:#eef4fb;object-fit:cover}
        .admin-body .post-thumb-empty{display:grid;place-items:center;color:#7890b0;font-size:13px;font-weight:800}
        .admin-body .post-actions{display:grid;gap:8px}
        .admin-body .post-actions .admin-action,.admin-body .post-actions .danger{width:100%;min-height:38px;border-radius:999px;background:#fff}
        .admin-body .post-title{font-size:17px;line-height:1.45;font-weight:700;color:#061936}
        @media(max-width:900px){.admin-body .admin-shell{grid-template-columns:1fr}.admin-body .admin-sidebar{position:relative;height:auto}.admin-body .admin-main{padding:22px 16px}.admin-body .admin-top h1{font-size:32px}.admin-body .stats,.admin-body .form-grid{grid-template-columns:1fr}.admin-body .admin-card-head,.admin-body .section-head{align-items:flex-start;flex-direction:column}}
    </style>
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
                <a class="admin-nav-link @if(request()->routeIs('admin.posts.*')) active @endif" href="{{ route('admin.posts.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"/><path d="M8 8h8"/><path d="M8 12h8"/><path d="M8 16h5"/></svg></span>
                    <span>Posts</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.modules.*')) active @endif" href="{{ route('admin.modules.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h6v6H4z"/><path d="M14 4h6v6h-6z"/><path d="M4 14h6v6H4z"/><path d="M14 14h6v6h-6z"/></svg></span>
                    <span>Products</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.blog-posts.*')) active @endif" href="{{ route('admin.blog-posts.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"/><path d="M8 8h8"/><path d="M8 12h8"/><path d="M8 16h5"/></svg></span>
                    <span>Blog Posts</span>
                </a>
                <a class="admin-nav-link @if(request()->routeIs('admin.faqs.*')) active @endif" href="{{ route('admin.faqs.index') }}">
                    <span class="admin-nav-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9.1 9a3 3 0 1 1 5.8 1c-.5 1.4-1.9 1.9-2.5 2.8-.3.4-.4.8-.4 1.2"/><path d="M12 17h.01"/><circle cx="12" cy="12" r="10"/></svg></span>
                    <span>FAQs</span>
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
