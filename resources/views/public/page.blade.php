@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Tiwi</p>
        <h1>{{ $page->title }}</h1>
    </div>
</section>
<section class="section">
    <div class="container content">
        {!! nl2br(e($page->content)) !!}
    </div>
</section>
@endsection
