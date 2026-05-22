@extends('layouts.admin')
@section('title', 'Edit Homepage Section')
@section('content')
<form class="content" method="POST" action="{{ route('admin.homepage-sections.update', $section) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-grid">
        <div class="field"><label>Label</label><input name="label" value="{{ old('label', $section->label) }}" required></div>
        <div class="field"><label>Sort order</label><input name="sort_order" type="number" min="0" value="{{ old('sort_order', $section->sort_order) }}" required></div>
    </div>
    <div class="field"><label>Heading</label><input name="heading" value="{{ old('heading', $section->heading) }}" required></div>
    <div class="field"><label>Body</label><textarea name="body">{{ old('body', $section->body) }}</textarea></div>
    @php
        $payload = $section->payload ?? [];
        $payloadLines = $payload['points'] ?? $payload['quotes'] ?? collect($payload)->map(fn ($value, $key) => is_array($value) ? null : "{$key}: {$value}")->filter()->values()->all();
    @endphp
    <div class="field"><label>Payload lines</label><textarea name="payload_text">{{ old('payload_text', implode(PHP_EOL, $payloadLines)) }}</textarea></div>
    <div class="field"><label>Image</label><input name="image" type="file"></div>
    <label><input type="checkbox" name="status" value="1" @checked(old('status', $section->status))> Active</label>
    <div class="actions"><button class="button" type="submit">Save section</button><a class="button ghost" href="{{ route('admin.homepage-sections.index') }}">Cancel</a></div>
</form>
@endsection
