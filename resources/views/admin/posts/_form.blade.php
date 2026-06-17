@csrf
<div class="admin-form-section">
    <div class="field">
        <label>Title</label>
        <input name="title" value="{{ old('title', $post->title) }}" required>
        @error('title')<span class="error">{{ $message }}</span>@enderror
    </div>
    <div class="field">
        <label>Excerpt</label>
        <textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</textarea>
        @error('excerpt')<span class="error">{{ $message }}</span>@enderror
    </div>
    <div class="field">
        <label>Content</label>
        <textarea class="admin-editor" name="content" required>{{ old('content', $post->content) }}</textarea>
        @error('content')<span class="error">{{ $message }}</span>@enderror
    </div>
    <div class="form-grid">
        <div class="field">
            <label>Meta title</label>
            <input name="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
            @error('meta_title')<span class="error">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label>Meta description</label>
            <input name="meta_description" value="{{ old('meta_description', $post->meta_description) }}">
            @error('meta_description')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-grid">
        <div class="field">
            <label>Published at</label>
            <input name="published_at" type="datetime-local" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\\TH:i')) }}">
            @error('published_at')<span class="error">{{ $message }}</span>@enderror
        </div>
        <div class="field">
            <label>Featured image</label>
            <input name="featured_image" type="file">
            @error('featured_image')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>
    <label class="admin-check"><input type="checkbox" name="status" value="1" @checked(old('status', $post->exists ? $post->status : true))> Active</label>
</div>
<div class="actions">
    <button class="button" type="submit">Save post</button>
    <a class="button ghost" href="{{ route('admin.posts.index') }}">Cancel</a>
</div>
