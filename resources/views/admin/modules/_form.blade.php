@csrf
<div class="form-grid">
    <div class="field"><label>Name</label><input name="name" value="{{ old('name', $module->name) }}" required>@error('name')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label>External URL</label><input name="external_url" value="{{ old('external_url', $module->external_url) }}">@error('external_url')<span class="error">{{ $message }}</span>@enderror</div>
</div>
<div class="field"><label>Short description</label><textarea name="short_description" required>{{ old('short_description', $module->short_description) }}</textarea>@error('short_description')<span class="error">{{ $message }}</span>@enderror</div>
<div class="field"><label>Full description</label><textarea name="full_description" required>{{ old('full_description', $module->full_description) }}</textarea>@error('full_description')<span class="error">{{ $message }}</span>@enderror</div>
<div class="field"><label>Features, one per line</label><textarea name="features_text">{{ old('features_text', implode(PHP_EOL, $module->features ?? [])) }}</textarea></div>
<div class="field"><label>Pricing text</label><textarea name="pricing_text">{{ old('pricing_text', $module->pricing_text) }}</textarea></div>
<div class="form-grid">
    <div class="field"><label>Meta title</label><input name="meta_title" value="{{ old('meta_title', $module->meta_title) }}"></div>
    <div class="field"><label>Meta description</label><input name="meta_description" value="{{ old('meta_description', $module->meta_description) }}"></div>
</div>
<div class="field"><label>Image</label><input name="image" type="file">@error('image')<span class="error">{{ $message }}</span>@enderror</div>
<label><input type="checkbox" name="status" value="1" @checked(old('status', $module->exists ? $module->status : true))> Active</label>
<div class="actions"><button class="button" type="submit">Save module</button><a class="button ghost" href="{{ route('admin.modules.index') }}">Cancel</a></div>
