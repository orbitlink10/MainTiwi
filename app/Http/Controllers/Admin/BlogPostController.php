<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('admin.blog-posts.index', ['posts' => BlogPost::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.blog-posts.create', ['post' => new BlogPost(['published_at' => now()])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');
        $data['featured_image'] = $request->file('featured_image')?->store('blog', 'public');

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post created.');
    }

    public function edit(BlogPost $blog_post)
    {
        return view('admin.blog-posts.edit', ['post' => $blog_post]);
    }

    public function update(Request $request, BlogPost $blog_post)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $blog_post->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post updated.');
    }

    public function destroy(BlogPost $blog_post)
    {
        $blog_post->delete();

        return back()->with('status', 'Blog post deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'published_at' => ['nullable', 'date'],
        ]);
    }
}
