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

    @if($section->key === 'header_navigation')
        @php
            $menuItems = old('menu_labels')
                ? collect(old('menu_labels'))->map(fn ($label, $index) => ['label' => $label, 'url' => old('menu_urls')[$index] ?? ''])->all()
                : ($section->payload['menu_items'] ?? []);
            $menuItems = count($menuItems) ? $menuItems : [['label' => '', 'url' => '']];
        @endphp

        <div class="admin-form-section">
            <div class="form-grid">
                <div class="field"><label>Section Label</label><input name="label" value="{{ old('label', $section->label) }}" required></div>
                <div class="field"><label>Sort Order</label><input name="sort_order" type="number" min="0" value="{{ old('sort_order', $section->sort_order) }}" required></div>
            </div>
            <div class="field"><label>Section Heading</label><input name="heading" value="{{ old('heading', $section->heading) }}" required>@error('heading')<span class="error">{{ $message }}</span>@enderror</div>
            <div class="field">
                <label>Logo</label>
                @if($section->image)
                    <img src="{{ asset('storage/'.$section->image) }}" alt="Current logo" style="max-width:180px;max-height:80px;margin-bottom:12px;border:1px solid #d8e4f2;border-radius:12px;padding:10px;background:#fff">
                @endif
                <input name="logo" type="file" accept="image/*">
                @error('logo')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label>Navigation Menus</label>
                <div id="menu-items" class="menu-items-editor">
                    @foreach($menuItems as $item)
                        <div class="menu-item-row">
                            <div class="menu-item-main">
                                <input name="menu_labels[]" value="{{ $item['label'] ?? '' }}" placeholder="Menu label">
                                <input name="menu_urls[]" value="{{ $item['url'] ?? '' }}" placeholder="/page-url or https://example.com">
                                <button class="button ghost menu-remove" type="button">Remove</button>
                            </div>
                            <textarea name="menu_dropdowns[]" placeholder="Dropdown links, one per line: Label | /url">{{ collect($item['children'] ?? [])->map(fn ($child) => ($child['label'] ?? '').' | '.($child['url'] ?? ''))->implode(PHP_EOL) }}</textarea>
                        </div>
                    @endforeach
                </div>
                <button class="button secondary" id="add-menu-item" type="button">Add menu</button>
            </div>
            <label class="admin-check"><input type="checkbox" name="status" value="1" @checked(old('status', $section->status))> Active</label>
        </div>
    @else
        <div class="admin-form-section">
        <div class="form-grid">
            <div class="field"><label>Section Label</label><input name="label" value="{{ old('label', $section->label) }}" required></div>
            <div class="field"><label>Sort Order</label><input name="sort_order" type="number" min="0" value="{{ old('sort_order', $section->sort_order) }}" required></div>
        </div>
        <div class="field"><label>Section Heading</label><textarea name="heading" required>{{ old('heading', $section->heading) }}</textarea>@error('heading')<span class="error">{{ $message }}</span>@enderror</div>
        <div class="field">
            <label>Section Body</label>
            @if($section->key === 'sliding_content')
                <p style="margin:0 0 12px;color:#607a9f;line-height:1.55">Use H2/H3 headings and paragraphs, or paste plain text with blank lines. Numbered sections become headings and short lines after a colon become bullet lists.</p>
                <textarea class="admin-editor rich-homepage-editor" name="body">{{ old('body', $section->body) }}</textarea>
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
    @endif

    <div class="actions"><button class="button" type="submit">Save section</button><a class="button ghost" href="{{ route('admin.homepage-sections.index') }}">Cancel</a></div>
</form>
@if($section->key === 'header_navigation')
    <style>
        .menu-items-editor{display:grid;gap:10px;margin-bottom:12px}
        .menu-item-row{display:grid;gap:10px;padding:12px;border:1px solid #d8e4f2;border-radius:14px;background:#f8fbff}
        .menu-item-main{display:grid;grid-template-columns:minmax(0,220px) minmax(0,1fr) auto;gap:10px;align-items:center}
        .menu-item-row textarea{min-height:82px}
        @media(max-width:900px){.menu-item-main{grid-template-columns:1fr}}
    </style>
    <script>
        const menuItems = document.getElementById('menu-items');
        const addMenuItem = document.getElementById('add-menu-item');

        function bindMenuRemove(button) {
            button.addEventListener('click', () => {
                const rows = menuItems.querySelectorAll('.menu-item-row');
                if (rows.length > 1) {
                    button.closest('.menu-item-row').remove();
                } else {
                    button.closest('.menu-item-row').querySelectorAll('input').forEach((input) => input.value = '');
                }
            });
        }

        document.querySelectorAll('.menu-remove').forEach(bindMenuRemove);
        addMenuItem.addEventListener('click', () => {
            const row = document.createElement('div');
            row.className = 'menu-item-row';
            row.innerHTML = '<div class="menu-item-main"><input name="menu_labels[]" placeholder="Menu label"><input name="menu_urls[]" placeholder="/page-url or https://example.com"><button class="button ghost menu-remove" type="button">Remove</button></div><textarea name="menu_dropdowns[]" placeholder="Dropdown links, one per line: Label | /url"></textarea>';
            menuItems.appendChild(row);
            bindMenuRemove(row.querySelector('.menu-remove'));
        });
    </script>
@endif
@if($section->key === 'sliding_content')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.rich-homepage-editor',
            height: 420,
            menubar: 'file edit view insert format tools',
            plugins: 'lists link code paste',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist | link | removeformat code',
            block_formats: 'Paragraph=p; Heading 2=h2; Heading 3=h3',
            paste_as_text: true,
            paste_data_images: false,
            forced_root_block: 'p',
            branding: true,
            promotion: true,
            content_style: `
                body { color: #132744; font-family: Inter, Arial, sans-serif; font-size: 16px; line-height: 1.65; }
                h1 { font-size: 22px; line-height: 1.3; margin: 0 0 14px; font-weight: 800; }
                h2 { font-size: 20px; line-height: 1.3; margin: 0 0 14px; font-weight: 800; }
                h3 { font-size: 18px; line-height: 1.35; margin: 20px 0 10px; font-weight: 800; }
                p { margin: 0 0 18px; font-size: 16px; font-weight: 400; }
                strong, b { font-weight: 700; }
                ul, ol { margin: 0 0 18px 24px; padding: 0; }
            `,
            setup(editor) {
                const cleanHtml = (html) => {
                    const template = document.createElement('template');
                    template.innerHTML = html;

                    template.content.querySelectorAll('*').forEach((node) => {
                        node.removeAttribute('style');
                        node.removeAttribute('class');
                        node.removeAttribute('face');
                        node.removeAttribute('size');
                        node.removeAttribute('color');
                    });

                    template.content.querySelectorAll('span,font').forEach((node) => {
                        node.replaceWith(...node.childNodes);
                    });

                    return template.innerHTML;
                };

                editor.on('init', () => {
                    const cleaned = cleanHtml(editor.getContent());
                    if (cleaned !== editor.getContent()) {
                        editor.setContent(cleaned);
                    }
                });

                editor.on('PastePreProcess', (event) => {
                    const text = event.content.replace(/<[^>]*>/g, '').trim();

                    if (!text) {
                        return;
                    }

                    event.content = text
                        .split(/\n{2,}/)
                        .map((block) => `<p>${block.replace(/\n/g, '<br>')}</p>`)
                        .join('');
                });
            }
        });

        document.querySelector('.admin-card').addEventListener('submit', () => {
            if (window.tinymce) {
                tinymce.triggerSave();
            }
        });
    </script>
@endif
@endsection
