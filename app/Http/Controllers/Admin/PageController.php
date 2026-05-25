<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', ['pages' => Page::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.pages.create', ['page' => new Page()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');
        $data['featured_image'] = $request->file('featured_image')?->store('pages', 'public');

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    public function update(Request $request, Page $page)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return back()->with('status', 'Page deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'heading' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:80'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
