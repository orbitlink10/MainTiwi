@extends('layouts.admin')
@section('title', 'Homepage Content')
@section('content')
<form class="admin-card" method="POST" action="{{ route('admin.homepage-sections.update', $section) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="admin-card-head">
        <div>
            <h2>{{ $section->label }}</h2>
            <p>Edit text blocks and homepage messaging.</p>
        </div>
        <a class="button ghost" href="{{ route('admin.homepage-sections.index') }}">Back to Homepage Content</a>
    </div>

    <div class="admin-form-section">
    <div class="form-grid">
        <div class="field"><label>Section Label</label><input name="label" value="{{ old('label', $section->label) }}" required></div>
        <div class="field"><label>Sort Order</label><input name="sort_order" type="number" min="0" value="{{ old('sort_order', $section->sort_order) }}" required></div>
    </div>
    <div class="field"><label>Hero Header Title / Section Heading</label><input name="heading" value="{{ old('heading', $section->heading) }}" required></div>
    <div class="field"><label>Hero Header Description / Body</label><textarea name="body">{{ old('body', $section->body) }}</textarea></div>
    @php
        $payload = $section->payload ?? [];
        $payloadLines = $payload['points'] ?? $payload['quotes'] ?? collect($payload)->map(fn ($value, $key) => is_array($value) ? null : "{$key}: {$value}")->filter()->values()->all();
    @endphp
    <div class="field"><label>Extra Content Lines</label><textarea name="payload_text">{{ old('payload_text', implode(PHP_EOL, $payloadLines)) }}</textarea></div>
    <div class="field"><label>Image</label><input name="image" type="file"></div>
    <label class="admin-check"><input type="checkbox" name="status" value="1" @checked(old('status', $section->status))> Active</label>
    </div>

    <div class="actions"><button class="button" type="submit">Save section</button><a class="button ghost" href="{{ route('admin.homepage-sections.index') }}">Cancel</a></div>
</form>
@endsection
