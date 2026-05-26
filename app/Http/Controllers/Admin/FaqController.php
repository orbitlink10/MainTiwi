<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faqs.index', [
            'faqs' => Faq::orderBy('sort_order')->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.faqs.create', [
            'faq' => new Faq([
                'sort_order' => (Faq::max('sort_order') ?? 0) + 1,
                'status' => true,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ created.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', ['faq' => $faq]);
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validated($request);
        $data['status'] = $request->boolean('status');

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('status', 'FAQ deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);
    }
}
