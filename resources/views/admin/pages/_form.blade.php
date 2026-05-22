@csrf
<div class="field"><label>Title</label><input name="title" value="{{ old('title', $page->title) }}" required>@error('title')<span class="error">{{ $message }}</span>@enderror</div>
<div class="field"><label>Content</label><textarea name="content" required>{{ old('content', $page->content) }}</textarea>@error('content')<span class="error">{{ $message }}</span>@enderror</div>
<div class="form-grid"><div class="field"><label>Meta title</label><input name="meta_title" value="{{ old('meta_title', $page->meta_title) }}"></div><div class="field"><label>Meta description</label><input name="meta_description" value="{{ old('meta_description', $page->meta_description) }}"></div></div>
<div class="field"><label>Featured image</label><input name="featured_image" type="file"></div>
<label><input type="checkbox" name="status" value="1" @checked(old('status', $page->exists ? $page->status : true))> Active</label>
<div class="actions"><button class="button" type="submit">Save page</button><a class="button ghost" href="{{ route('admin.pages.index') }}">Cancel</a></div>
