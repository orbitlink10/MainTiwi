@csrf
<div class="admin-form-section">
    <div class="field">
        <label>Meta Title</label>
        <input name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" placeholder="Enter Meta Title">
        @error('meta_title')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Meta Description</label>
        <textarea name="meta_description" placeholder="Enter Meta Description">{{ old('meta_description', $page->meta_description) }}</textarea>
        @error('meta_description')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Page Title</label>
        <input name="title" value="{{ old('title', $page->title) }}" placeholder="Enter Keyword Title" required>
        @error('title')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Image Alt Text</label>
        <input name="image_alt_text" value="{{ old('image_alt_text', $page->image_alt_text) }}" placeholder="Enter Image Alt Text">
        @error('image_alt_text')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Heading 2</label>
        <input name="heading" value="{{ old('heading', $page->heading) }}" placeholder="Enter Heading 2">
        @error('heading')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Type</label>
        <select name="type" required>
            @foreach(['Post', 'Page', 'Service', 'Product', 'Landing Page'] as $type)
                <option value="{{ $type }}" @selected(old('type', $page->type ?: 'Post') === $type)>{{ $type }}</option>
            @endforeach
        </select>
        @error('type')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Image</label>
        <input name="featured_image" type="file">
        @error('featured_image')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="field">
        <label>Page Description</label>
        <textarea class="admin-editor" name="content" placeholder="Enter page description" required>{{ old('content', $page->content) }}</textarea>
        @error('content')<span class="error">{{ $message }}</span>@enderror
    </div>

    <label class="admin-check"><input type="checkbox" name="status" value="1" @checked(old('status', $page->exists ? $page->status : true))> Active</label>
</div>

<div class="actions">
    <button class="button" type="submit">Save page</button>
    <a class="button ghost" href="{{ route('admin.pages.index') }}">Cancel</a>
</div>
