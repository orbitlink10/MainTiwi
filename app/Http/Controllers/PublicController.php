<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\HomepageSection;
use App\Models\Module;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'modules' => Module::active()->orderBy('name')->take(6)->get(),
            'posts' => BlogPost::published()->latest('published_at')->take(3)->get(),
            'faqs' => Faq::active()->orderBy('sort_order')->orderBy('question')->get(),
            'sections' => HomepageSection::active()->get()->keyBy('key'),
            'metaTitle' => 'Tiwi | Business Software Modules',
            'metaDescription' => 'Tiwi markets and links business software modules for POS, property management, schools, itinerary building, and manufacturing.',
        ]);
    }

    public function about()
    {
        return $this->pageBySlug('about-tiwi', 'public.page');
    }

    public function pricing()
    {
        return $this->pageBySlug('pricing', 'public.pricing');
    }

    public function modules()
    {
        return view('public.modules.index', [
            'modules' => Module::active()->orderBy('name')->get(),
            'metaTitle' => 'Solutions and Modules | Tiwi',
            'metaDescription' => 'Explore Tiwi software modules for POS, property management, school, itinerary, and manufacturing operations.',
        ]);
    }

    public function module(Module $module)
    {
        abort_unless($module->status, 404);

        return view('public.modules.show', [
            'module' => $module,
            'metaTitle' => $module->meta_title ?: $module->name.' | Tiwi',
            'metaDescription' => $module->meta_description ?: $module->short_description,
        ]);
    }

    public function blog()
    {
        return view('public.blog.index', [
            'posts' => BlogPost::published()->latest('published_at')->paginate(9),
            'metaTitle' => 'Blog and News | Tiwi',
            'metaDescription' => 'Read Tiwi product updates, module notes, and business software implementation guidance.',
        ]);
    }

    public function post(BlogPost $post)
    {
        abort_unless($post->status && $post->published_at?->lte(now()), 404);

        return view('public.blog.show', [
            'post' => $post,
            'metaTitle' => $post->meta_title ?: $post->title.' | Tiwi',
            'metaDescription' => $post->meta_description ?: $post->excerpt,
        ]);
    }

    public function publicPost(string $slug)
    {
        $post = null;

        if (Schema::hasColumn('posts', 'slug')) {
            $post = Post::where('slug', $slug)->first();
        }

        if (! $post) {
            $post = Post::query()
                ->get()
                ->first(fn (Post $post) => Str::slug($post->admin_title) === $slug);
        }

        abort_unless($post, 404);

        return view('public.posts.show', [
            'post' => $post,
            'metaTitle' => ($post->meta_title ?? null) ?: $post->admin_title.' | Tiwi',
            'metaDescription' => ($post->meta_description ?? null) ?: str(strip_tags($post->admin_description))->limit(155),
        ]);
    }

    private function pageBySlug(string $slug, string $view)
    {
        $page = Page::active()->where('slug', $slug)->firstOrFail();

        return view($view, [
            'page' => $page,
            'modules' => Module::active()->orderBy('name')->get(),
            'metaTitle' => $page->meta_title ?: $page->title.' | Tiwi',
            'metaDescription' => $page->meta_description ?: str($page->content)->limit(155),
        ]);
    }
}
