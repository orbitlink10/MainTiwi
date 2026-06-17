@csrf
@php
    $pageTitle = old('page_title', $post->admin_title);
    $metaTitle = old('meta_title', $post->meta_title ?? '');
    $metaDescription = old('meta_description', $post->meta_description ?? '');
    $altText = old('alt_text', $post->admin_alt_text);
    $heading2 = old('heading_2', $post->heading_2 ?? '');
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
            <div class="editor-shell">
                <div class="editor-menu">
                    <span>File</span><span>Edit</span><span>View</span><span>Insert</span><span>Format</span><span>Tools</span><span>Table</span>
                </div>
                <div class="editor-toolbar" aria-hidden="true">
                    <span>Undo</span><span>Redo</span><strong>B</strong><em>I</em><span>Left</span><span>Center</span><span>Right</span><span>Justify</span><span>Outdent</span><span>Indent</span><span>Link</span><span>Image</span><span>Video</span><span>&lt;&gt;</span><span>Full</span>
                </div>
                <textarea class="post-description-editor" name="page_description">{{ $description }}</textarea>
            </div>
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
