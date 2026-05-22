<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomepageSectionController extends Controller
{
    public function index()
    {
        return view('admin.homepage-sections.index', [
            'sections' => HomepageSection::orderBy('sort_order')->paginate(15),
        ]);
    }

    public function edit(HomepageSection $homepage_section)
    {
        return view('admin.homepage-sections.edit', ['section' => $homepage_section]);
    }

    public function update(Request $request, HomepageSection $homepage_section)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:120'],
            'heading' => ['required', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'payload_text' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['status'] = $request->boolean('status');
        $data['payload'] = $this->payloadFromText($request->input('payload_text'));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('homepage', 'public');
        }

        $homepage_section->update($data);

        return redirect()->route('admin.homepage-sections.index')->with('status', 'Homepage section updated.');
    }

    private function payloadFromText(?string $text): array
    {
        $items = collect(preg_split('/\r\n|\r|\n/', (string) $text))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();

        return Str::contains((string) $text, ':')
            ? collect($items)->mapWithKeys(function ($item) {
                [$key, $value] = array_pad(explode(':', $item, 2), 2, '');
                return [Str::slug(trim($key), '_') => trim($value)];
            })->all()
            : ['points' => $items];
    }
}
