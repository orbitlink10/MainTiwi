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
    <div class="field"><label>Section Heading</label><textarea name="heading" required>{{ old('heading', $section->heading) }}</textarea>@error('heading')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field">
        <label>Section Body</label>
        @if($section->key === 'sliding_content')
            <p style="margin:0 0 12px;color:#607a9f;line-height:1.55">Use H2/H3 headings and paragraphs. This content appears in the sliding panel after the homepage call-to-action section.</p>
            <textarea class="admin-editor rich-homepage-editor" name="body">{{ old('body', $section->body) }}</textarea>
        @else
            <textarea name="body">{{ old('body', $section->body) }}</textarea>
        @endif
        @error('body')<span class="error">{{ $message }}</span>@enderror
    </div>
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
@if($section->key === 'sliding_content')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.rich-homepage-editor',
            height: 420,
            menubar: 'file edit view insert format tools',
            plugins: 'lists link code',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist | link | code',
            block_formats: 'Paragraph=p; Heading 2=h2; Heading 3=h3',
            branding: true,
            promotion: true
        });
    </script>
@endif
@endsection
