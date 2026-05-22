@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Pricing</p>
        <h1>{{ $page->title }}</h1>
        <p>{{ $page->content }}</p>
    </div>
</section>
<section class="section">
    <div class="container grid">
        @foreach($modules as $module)
            <article class="card">
                <h3>{{ $module->name }}</h3>
                <p>{{ $module->pricing_text ?: 'Contact Tiwi for pricing.' }}</p>
                <a class="button secondary" href="{{ route('modules.show', $module) }}">View module</a>
            </article>
        @endforeach
    </div>
</section>
@endsection
