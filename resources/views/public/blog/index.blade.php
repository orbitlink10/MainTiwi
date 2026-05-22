@extends('layouts.public')

@section('content')
<section class="page-title">
    <div class="container">
        <p class="eyebrow">Blog</p>
        <h1>Tiwi news and updates</h1>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="grid">
            @foreach($posts as $post)
                <article class="card">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                    <a class="button secondary" href="{{ route('blog.show', $post) }}">Read post</a>
                </article>
            @endforeach
        </div>
        <div class="pagination">{{ $posts->links() }}</div>
    </div>
</section>
@endsection
