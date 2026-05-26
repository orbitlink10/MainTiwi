@csrf
<div class="admin-form-section">
    <div class="field">
        <label>Question</label>
        <input name="question" value="{{ old('question', $faq->question) }}" required>
        @error('question')<span class="error">{{ $message }}</span>@enderror
    </div>
    <div class="field">
        <label>Answer</label>
        <textarea class="admin-editor" name="answer" required>{{ old('answer', $faq->answer) }}</textarea>
        @error('answer')<span class="error">{{ $message }}</span>@enderror
    </div>
    <div class="form-grid">
        <div class="field">
            <label>Sort order</label>
            <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" required>
            @error('sort_order')<span class="error">{{ $message }}</span>@enderror
        </div>
        <label class="admin-check">
            <input type="checkbox" name="status" value="1" @checked(old('status', $faq->exists ? $faq->status : true))>
            Active
        </label>
    </div>
</div>
<div class="actions">
    <button class="button" type="submit">Save FAQ</button>
    <a class="button ghost" href="{{ route('admin.faqs.index') }}">Cancel</a>
</div>
