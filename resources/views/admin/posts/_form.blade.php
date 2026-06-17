@csrf
@php
    $pageTitle = old('page_title', $post->admin_title);
    $metaTitle = old('meta_title', $post->meta_title ?? '');
    $metaDescription = old('meta_description', $post->meta_description ?? '');
    $altText = old('alt_text', $post->admin_alt_text);
    $heading2 = old('heading_2', $post->admin_heading2);
    $type = old('type', $post->admin_type);
    $description = old('page_description', $post->admin_description);
@endphp

<div class="post-form-panel">
    <div class="post-form-title">{{ $post->exists ? 'Update Post' : 'Add New Post' }}</div>
    <div class="post-form-body">
        <div class="field">
            <label>Meta Title</label>
            <input name="meta_title" value="{{ $metaTitle }}" placeholder="Enter Meta Title">
            @error('meta_title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Meta Description</label>
            <input name="meta_description" value="{{ $metaDescription }}" placeholder="Enter Meta Description">
            @error('meta_description')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Page Title</label>
            <input name="page_title" value="{{ $pageTitle }}" placeholder="Enter Keyword Title" required>
            @error('page_title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Image Alt Text</label>
            <input name="alt_text" value="{{ $altText }}" placeholder="Enter Image Alt Text">
            @error('alt_text')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Heading 2</label>
            <input name="heading_2" value="{{ $heading2 }}" placeholder="Enter Heading 2">
            @error('heading_2')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Type</label>
            <select name="type">
                <option value="Post" @selected($type === 'Post')>Post</option>
                <option value="Page" @selected($type === 'Page')>Page</option>
            </select>
            @error('type')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Featured Image</label>
            <input name="featured_image" type="file">
            @if($post->admin_image_url)
                <img class="post-form-preview" src="{{ $post->admin_image_url }}" alt="{{ $post->admin_alt_text }}">
            @endif
            @error('featured_image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label>Page Description:</label>
            <textarea id="page_description_editor" class="post-description-editor" name="page_description">{{ $description }}</textarea>
            @error('page_description')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-grid">
            <div class="field">
                <label>Published at</label>
                <input name="published_at" type="datetime-local" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\\TH:i')) }}">
                @error('published_at')<span class="error">{{ $message }}</span>@enderror
            </div>
            <label class="admin-check post-status"><input type="checkbox" name="status" value="1" @checked(old('status', $post->exists ? ($post->status ?? true) : true))> Active</label>
        </div>
    </div>
</div>

<div class="actions">
    <button class="button" type="submit">Save post</button>
    <a class="button ghost" href="{{ route('admin.posts.index') }}">Cancel</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.tinymce) {
            return;
        }

        tinymce.init({
            selector: '#page_description_editor',
            base_url: 'https://cdn.jsdelivr.net/npm/tinymce@6.8.5',
            suffix: '.min',
            height: 560,
            menubar: 'file edit view insert format tools table',
            plugins: 'lists link image media table code fullscreen autoresize',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image media | code fullscreen',
            branding: false,
            promotion: false,
            statusbar: false,
            resize: true,
            content_style: 'body{font-family:Arial,Helvetica,sans-serif;font-size:18px;line-height:1.65;color:#111827;padding:24px;} h1{font-size:42px;line-height:1.2;margin:0 0 22px;font-weight:800;} h2{font-size:30px;line-height:1.25;margin:28px 0 16px;font-weight:800;} p{margin:0 0 18px;} img{max-width:100%;height:auto;} table{width:100%;border-collapse:collapse;}',
            convert_urls: false,
            automatic_uploads: true,
            file_picker_types: 'image media',
            setup: function (editor) {
                editor.on('change keyup', function () {
                    editor.save();
                });
            }
        });
    });
</script>
