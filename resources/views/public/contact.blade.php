@extends('layouts.public')

@section('content')
<style>
    .contact-page{background:#fff;color:#111827;font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif}
    .contact-shell{width:min(100% - 40px,1180px);margin:0 auto}
    .contact-hero{border-bottom:1px solid #e5e7eb;background:linear-gradient(180deg,#fff 0,#f8fbff 100%);padding:72px 0 54px}
    .contact-hero-grid{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(300px,.9fr);gap:54px;align-items:end}
    .contact-kicker{margin:0 0 14px;color:#ee0011;font-size:13px;line-height:18px;font-weight:900;letter-spacing:.16em;text-transform:uppercase}
    .contact-title{max-width:760px;margin:0;color:#0f172a;font-size:clamp(42px,5vw,68px);line-height:1;font-weight:850;letter-spacing:0}
    .contact-lead{max-width:700px;margin:22px 0 0;color:#475569;font-size:20px;line-height:1.6}
    .contact-hero-panel{border:1px solid #e2e8f0;border-radius:8px;background:#fff;padding:26px;box-shadow:0 14px 36px rgba(15,23,42,.07)}
    .contact-hero-panel h2{margin:0 0 10px;color:#111827;font-size:20px;line-height:28px;font-weight:850}
    .contact-hero-panel p{margin:0;color:#475569;font-size:15px;line-height:1.7}
    .contact-points{display:grid;gap:12px;margin:22px 0 0;padding:0;list-style:none}
    .contact-points li{display:flex;gap:12px;color:#334155;font-size:14px;line-height:1.55;font-weight:750}
    .contact-points li::before{content:"";flex:0 0 8px;width:8px;height:8px;margin-top:7px;border-radius:50%;background:#ee0011}
    .contact-section{padding:56px 0 76px}
    .contact-grid{display:grid;grid-template-columns:minmax(0,760px) 300px;gap:72px;align-items:start}
    .contact-card{border:1px solid #e2e8f0;border-radius:8px;background:#fff;box-shadow:0 12px 30px rgba(15,23,42,.06)}
    .contact-form-head{border-bottom:1px solid #e5e7eb;padding:26px 28px}
    .contact-form-head h2{margin:0;color:#111827;font-size:28px;line-height:36px;font-weight:850}
    .contact-form-head p{margin:8px 0 0;color:#64748b;font-size:15px;line-height:1.65}
    .contact-form{padding:28px}
    .contact-form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
    .contact-field{display:grid;gap:8px;margin-bottom:18px}
    .contact-field label{color:#111827;font-size:14px;line-height:20px;font-weight:850}
    .contact-field input,.contact-field textarea{width:100%;border:1px solid #cfd8e3;border-radius:8px;background:#fff;color:#111827;padding:12px 14px;font:inherit;font-size:15px;line-height:1.45;transition:border-color .15s,box-shadow .15s}
    .contact-field input{min-height:46px}
    .contact-field textarea{min-height:170px;resize:vertical}
    .contact-field input:focus,.contact-field textarea:focus{outline:0;border-color:#ee0011;box-shadow:0 0 0 3px rgba(238,0,17,.12)}
    .contact-error{color:#dc2626;font-size:13px;line-height:18px;font-weight:750}
    .contact-submit{display:inline-flex;align-items:center;justify-content:center;min-height:46px;border:1px solid #ee0011;border-radius:6px;background:#ee0011;padding:0 20px;color:#fff;font-size:15px;font-weight:850;cursor:pointer}
    .contact-notice{margin:0 0 20px;border:1px solid #bbf7d0;border-radius:8px;background:#f0fdf4;padding:14px 16px;color:#166534;font-size:14px;line-height:20px;font-weight:800}
    .contact-aside{position:sticky;top:98px;display:grid;gap:18px}
    .contact-panel{border:1px solid #e7e9ef;border-radius:8px;background:#fff;padding:22px;box-shadow:0 10px 30px rgba(17,24,39,.06)}
    .contact-panel h2{margin:0 0 14px;color:#111827;font-size:18px;line-height:24px;font-weight:850}
    .contact-panel p{margin:0;color:#475569;font-size:14px;line-height:1.65}
    .contact-module-list{display:grid;gap:9px;margin:0;padding:0;list-style:none}
    .contact-module-list a{display:block;border:1px solid #edf0f5;border-radius:6px;padding:10px 12px;color:#243041;font-size:14px;line-height:20px;font-weight:750;text-decoration:none}
    .contact-module-list a:hover{border-color:#ee0011;color:#ee0011}
    .contact-info-list{display:grid;gap:12px;margin:0;padding:0;list-style:none}
    .contact-info-list li{border-bottom:1px solid #edf0f5;padding-bottom:12px;color:#475569;font-size:14px;line-height:1.55}
    .contact-info-list li:last-child{border-bottom:0;padding-bottom:0}
    .contact-info-list strong{display:block;margin-bottom:4px;color:#111827}
    .contact-mini-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px;margin-top:28px}
    .contact-mini{border-top:1px solid #e5e7eb;padding-top:14px}
    .contact-mini strong{display:block;color:#111827;font-size:24px;line-height:1;font-weight:850}
    .contact-mini span{display:block;margin-top:7px;color:#64748b;font-size:13px;line-height:18px;font-weight:750}
    @media(max-width:980px){.contact-hero-grid,.contact-grid{grid-template-columns:1fr}.contact-aside{position:static}.contact-mini-grid{grid-template-columns:1fr 1fr 1fr}}
    @media(max-width:640px){.contact-shell{width:min(100% - 32px,1180px)}.contact-hero{padding:46px 0 38px}.contact-title{font-size:38px}.contact-lead{font-size:18px}.contact-section{padding:42px 0 58px}.contact-form-grid,.contact-mini-grid{grid-template-columns:1fr}.contact-form,.contact-form-head{padding:22px}.contact-submit{width:100%}}
</style>

<main class="contact-page">
    <section class="contact-hero">
        <div class="contact-shell contact-hero-grid">
            <div>
                <p class="contact-kicker">Contact</p>
                <h1 class="contact-title">Talk to Tiwi about your software rollout</h1>
                <p class="contact-lead">Send a clear request about a module, implementation plan, integration need, or external system link.</p>
                <div class="contact-mini-grid">
                    <div class="contact-mini"><strong>{{ $modules->count() }}</strong><span>Active modules</span></div>
                    <div class="contact-mini"><strong>1</strong><span>Contact point</span></div>
                    <div class="contact-mini"><strong>Fast</strong><span>Routing support</span></div>
                </div>
            </div>

            <aside class="contact-hero-panel" aria-label="Contact guidance">
                <h2>Help us route your message correctly.</h2>
                <p>Include the module you are interested in, your business type, the current workflow, and what you want the system to help you improve.</p>
                <ul class="contact-points">
                    <li>Module selection or product comparison</li>
                    <li>Demo, rollout, or implementation planning</li>
                    <li>External system links and partnership requests</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="contact-section">
        <div class="contact-shell contact-grid">
            <article class="contact-card">
                <div class="contact-form-head">
                    <p class="contact-kicker">Message</p>
                    <h2>Send your request</h2>
                    <p>Use the form below and the Tiwi team will review the details.</p>
                </div>

                <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    @if(session('status'))
                        <div class="contact-notice">{{ session('status') }}</div>
                    @endif

                    <div class="contact-form-grid">
                        <div class="contact-field">
                            <label for="name">Name</label>
                            <input id="name" name="name" value="{{ old('name') }}" autocomplete="name" required>
                            @error('name')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="contact-field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required>
                            @error('email')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="contact-field">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel">
                            @error('phone')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="contact-field">
                            <label for="company">Company</label>
                            <input id="company" name="company" value="{{ old('company') }}" autocomplete="organization">
                            @error('company')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="subject">Subject</label>
                        <input id="subject" name="subject" value="{{ old('subject') }}" required>
                        @error('subject')<span class="contact-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="contact-field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        @error('message')<span class="contact-error">{{ $message }}</span>@enderror
                    </div>

                    <button class="contact-submit" type="submit">Send message</button>
                </form>
            </article>

            <aside class="contact-aside" aria-label="Contact sidebar">
                <div class="contact-panel">
                    <h2>Inquiry types</h2>
                    <ul class="contact-info-list">
                        <li><strong>Product fit</strong>Ask which module fits your business workflow.</li>
                        <li><strong>Implementation</strong>Discuss rollout timelines, teams, and data preparation.</li>
                        <li><strong>Partnerships</strong>Send requests about external links or product relationships.</li>
                    </ul>
                </div>

                @if($modules->isNotEmpty())
                    <div class="contact-panel">
                        <h2>Available modules</h2>
                        <ul class="contact-module-list">
                            @foreach($modules as $module)
                                <li><a href="{{ route('modules.show', $module) }}">{{ $module->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>
</main>
@endsection
