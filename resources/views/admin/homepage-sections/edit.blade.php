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
            <input type="hidden" name="body" id="sliding-content-body" value="{{ old('body', $section->body) }}">
            <div class="sliding-editor-toolbar" aria-label="Sliding content formatting">
                <button type="button" data-command="formatBlock" data-value="h2">H2</button>
                <button type="button" data-command="formatBlock" data-value="h3">H3</button>
                <button type="button" data-command="formatBlock" data-value="p">P</button>
                <button type="button" data-command="bold">B</button>
                <button type="button" data-command="insertUnorderedList">List</button>
                <button type="button" data-command="insertOrderedList">1. List</button>
                <button type="button" data-command="createLink">Link</button>
            </div>
            <div id="sliding-content-editor" class="sliding-content-editor" contenteditable="true">{!! old('body', $section->body) !!}</div>
        @else
            <textarea name="body">{{ old('body', $section->body) }}</textarea>
        @endif
        @error('body')<span class="error">{{ $message }}</span>@enderror
    </div>
    @if($section->key === 'sliding_content')
        <input type="hidden" name="payload_text" value="">
    @else
        @php
            $payload = $section->payload ?? [];
            $payloadLines = $payload['points'] ?? $payload['quotes'] ?? collect($payload)->map(fn ($value, $key) => is_array($value) ? null : "{$key}: {$value}")->filter()->values()->all();
        @endphp
        <div class="field"><label>Extra Content Lines</label><textarea name="payload_text">{{ old('payload_text', implode(PHP_EOL, $payloadLines)) }}</textarea></div>
        <div class="field"><label>Image</label><input name="image" type="file"></div>
    @endif
    <label class="admin-check"><input type="checkbox" name="status" value="1" @checked(old('status', $section->status))> Active</label>
    </div>

    <div class="actions"><button class="button" type="submit">Save section</button><a class="button ghost" href="{{ route('admin.homepage-sections.index') }}">Cancel</a></div>
</form>
@if($section->key === 'sliding_content')
    <style>
        .sliding-editor-toolbar{display:flex;flex-wrap:wrap;gap:8px;padding:10px;border:1px solid #cddcf0;border-bottom:0;border-radius:12px 12px 0 0;background:#f7faff}
        .sliding-editor-toolbar button{min-height:34px;padding:0 12px;border:1px solid #c7d7ee;border-radius:8px;background:#fff;color:#27456d;font:inherit;font-size:13px;font-weight:800;cursor:pointer}
        .sliding-editor-toolbar button:hover{border-color:#2d7ff0;color:#0f54b8}
        .sliding-content-editor{min-height:420px;max-height:620px;overflow:auto;padding:22px;border:1px solid #cddcf0;border-radius:0 0 12px 12px;background:#fff;color:#132744;font-size:16px;line-height:1.65}
        .sliding-content-editor:focus{outline:0;border-color:#2d7ff0;box-shadow:0 0 0 3px rgba(45,127,240,.12)}
        .sliding-content-editor h1{margin:0 0 16px;font-size:28px;line-height:1.25;font-weight:800;color:#061936}
        .sliding-content-editor h2{margin:0 0 16px;font-size:24px;line-height:1.25;font-weight:800;color:#061936}
        .sliding-content-editor h3{margin:22px 0 12px;font-size:20px;line-height:1.3;font-weight:800;color:#061936}
        .sliding-content-editor p{margin:0 0 18px}
        .sliding-content-editor strong,.sliding-content-editor b{font-weight:700}
        .sliding-content-editor ul,.sliding-content-editor ol{margin:0 0 18px 24px;padding:0}
        .sliding-content-editor ul{list-style:disc}
        .sliding-content-editor ol{list-style:decimal}
    </style>
    <script>
        const slidingEditor = document.getElementById('sliding-content-editor');
        const slidingInput = document.getElementById('sliding-content-body');

        function syncSlidingContent() {
            slidingInput.value = slidingEditor.innerHTML.trim();
        }

        document.querySelectorAll('.sliding-editor-toolbar button').forEach((button) => {
            button.addEventListener('click', () => {
                slidingEditor.focus();
                const command = button.dataset.command;
                let value = button.dataset.value || null;

                if (command === 'createLink') {
                    value = prompt('Enter the link URL');
                    if (!value) {
                        return;
                    }
                }

                document.execCommand(command, false, value);
                syncSlidingContent();
            });
        });

        slidingEditor.addEventListener('input', syncSlidingContent);
        slidingEditor.addEventListener('paste', (event) => {
            event.preventDefault();

            const text = (event.clipboardData || window.clipboardData).getData('text/plain').trim();
            if (!text) {
                return;
            }

            const html = text
                .split(/\n{2,}/)
                .map((block) => `<p>${block.replace(/\n/g, '<br>')}</p>`)
                .join('');

            document.execCommand('insertHTML', false, html);
            syncSlidingContent();
        });
        slidingEditor.closest('form').addEventListener('submit', syncSlidingContent);
    </script>
@endif
@endsection
