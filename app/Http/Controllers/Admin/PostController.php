<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PostController extends Controller
{
    public function index()
    {
        $query = Schema::hasColumn('posts', 'created_at')
            ? Post::orderByDesc('created_at')
            : Post::orderByDesc('id');

        return view('admin.posts.index', ['posts' => $query->paginate(15)]);
    }

    public function create()
    {
        return view('admin.posts.create', ['post' => new Post(['published_at' => now()])]);
    }

    public function store(Request $request)
    {
        Post::create($this->postData($request));

        return redirect()->route('admin.posts.index')->with('status', 'Post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function show(Post $post)
    {
        return redirect($post->public_url);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->postData($request, $post));

        return redirect()->route('admin.posts.index')->with('status', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('status', 'Post deleted.');
    }

    public function bulkAction(Request $request)
    {
        $data = $request->validate([
            'action' => ['required', 'in:delete'],
            'posts' => ['required', 'array'],
            'posts.*' => ['integer'],
        ]);

        $deleted = Post::whereKey($data['posts'])->delete();

        return back()->with('status', "{$deleted} post(s) deleted.");
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'page_title' => ['required', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'heading_2' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:50'],
            'page_description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'max:4096'],
            'published_at' => ['nullable', 'date'],
        ]);
    }

    private function postData(Request $request, ?Post $post = null): array
    {
        $validated = $this->validated($request);
        $columns = collect(Schema::getColumnListing('posts'))->flip();
        $data = [];

        $this->putIfColumnExists($data, $columns, 'title', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'page_title', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'keyword_title', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'post_title', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'heading_1', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'heading1', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'name', $validated['page_title']);
        $this->putIfColumnExists($data, $columns, 'meta_title', $validated['meta_title'] ?? null);
        $this->putIfColumnExists($data, $columns, 'meta_description', $validated['meta_description'] ?? null);
        $this->putIfColumnExists($data, $columns, 'alt_text', $validated['alt_text'] ?? null);
        $this->putIfColumnExists($data, $columns, 'image_alt_text', $validated['alt_text'] ?? null);
        $this->putIfColumnExists($data, $columns, 'image_alt', $validated['alt_text'] ?? null);
        $this->putIfColumnExists($data, $columns, 'alt', $validated['alt_text'] ?? null);
        $this->putIfColumnExists($data, $columns, 'heading_2', $validated['heading_2'] ?? null);
        $this->putIfColumnExists($data, $columns, 'heading2', $validated['heading_2'] ?? null);
        $this->putIfColumnExists($data, $columns, 'sub_heading', $validated['heading_2'] ?? null);
        $this->putIfColumnExists($data, $columns, 'subheading', $validated['heading_2'] ?? null);
        $this->putIfColumnExists($data, $columns, 'subtitle', $validated['heading_2'] ?? null);
        $this->putIfColumnExists($data, $columns, 'type', $validated['type'] ?? 'Post');
        $this->putIfColumnExists($data, $columns, 'post_type', $validated['type'] ?? 'Post');
        $this->putIfColumnExists($data, $columns, 'page_type', $validated['type'] ?? 'Post');
        $this->putIfColumnExists($data, $columns, 'content', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'page_description', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'description', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'body', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'details', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'long_description', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'post_content', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'desc', $validated['page_description'] ?? '');
        $this->putIfColumnExists($data, $columns, 'excerpt', str($validated['meta_description'] ?? $validated['page_description'] ?? '')->limit(500));
        $this->putIfColumnExists($data, $columns, 'status', $request->boolean('status', true));
        $this->putIfColumnExists($data, $columns, 'published_at', $validated['published_at'] ?? now());

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $this->putIfColumnExists($data, $columns, 'featured_image', $path);
            $this->putIfColumnExists($data, $columns, 'image', $path);
            $this->putIfColumnExists($data, $columns, 'image_path', $path);
            $this->putIfColumnExists($data, $columns, 'photo', $path);
            $this->putIfColumnExists($data, $columns, 'thumbnail', $path);
            $this->putIfColumnExists($data, $columns, 'banner', $path);
        }

        return $data;
    }

    private function putIfColumnExists(array &$data, $columns, string $column, mixed $value): void
    {
        if ($columns->has($column)) {
            $data[$column] = $value;
        }
    }
}
