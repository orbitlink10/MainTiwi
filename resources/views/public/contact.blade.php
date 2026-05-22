@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Contact</p>
        <h1>Talk to Tiwi</h1>
        <p>Send a message about a module, rollout plan, or external system link.</p>
    </div>
</section>
<section class="section">
    <div class="container grid">
        <form class="content" method="POST" action="{{ route('contact.store') }}" style="grid-column: span 2;">
            @csrf
            @if(session('status')) <div class="notice">{{ session('status') }}</div> @endif
            <div class="form-grid">
                <div class="field"><label>Name</label><input name="name" value="{{ old('name') }}" required>@error('name')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field"><label>Email</label><input name="email" type="email" value="{{ old('email') }}" required>@error('email')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field"><label>Phone</label><input name="phone" value="{{ old('phone') }}"></div>
                <div class="field"><label>Company</label><input name="company" value="{{ old('company') }}"></div>
            </div>
            <div class="field"><label>Subject</label><input name="subject" value="{{ old('subject') }}" required>@error('subject')<span class="error">{{ $message }}</span>@enderror</div>
            <div class="field"><label>Message</label><textarea name="message" required>{{ old('message') }}</textarea>@error('message')<span class="error">{{ $message }}</span>@enderror</div>
            <button class="button" type="submit">Send message</button>
        </form>
        <aside class="card">
            <h3>Modules</h3>
            @foreach($modules as $module)
                <a href="{{ route('modules.show', $module) }}">{{ $module->name }}</a><br>
            @endforeach
        </aside>
    </div>
</section>
@endsection
