@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Solutions</p>
        <h1>Tiwi software modules</h1>
        <p>Explore the modules marketed through Tiwi and access each specialist system externally.</p>
    </div>
</section>
<section class="section">
    <div class="container grid">
        @foreach($modules as $module)
            <article class="card">
                @if($module->image)<img src="{{ asset('storage/'.$module->image) }}" alt="{{ $module->name }}">@endif
                <h3>{{ $module->name }}</h3>
                <p>{{ $module->short_description }}</p>
                <a class="button secondary" href="{{ route('modules.show', $module) }}">Learn more</a>
            </article>
        @endforeach
    </div>
</section>
@endsection
