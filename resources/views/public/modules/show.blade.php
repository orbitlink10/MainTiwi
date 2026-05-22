@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Module</p>
        <h1>{{ $module->name }}</h1>
        <p>{{ $module->short_description }}</p>
        <div class="actions">
            @if($module->external_url)<a class="button" href="{{ $module->external_url }}" target="_blank" rel="noopener">Open module</a>@endif
            <a class="button secondary" href="{{ route('contact') }}">Ask about this module</a>
        </div>
    </div>
</section>
<section class="section">
    <div class="container grid">
        <article class="content" style="grid-column: span 2;">
            @if($module->image)<img src="{{ asset('storage/'.$module->image) }}" alt="{{ $module->name }}">@endif
            <h2>Overview</h2>
            <p>{{ $module->full_description }}</p>
            <h2>Pricing</h2>
            <p>{{ $module->pricing_text ?: 'Contact Tiwi for pricing information.' }}</p>
        </article>
        <aside class="card">
            <h3>Features</h3>
            <ul class="feature-list">
                @forelse($module->features ?? [] as $feature)
                    <li>{{ $feature }}</li>
                @empty
                    <li>Feature list coming soon.</li>
                @endforelse
            </ul>
        </aside>
    </div>
</section>
@endsection
