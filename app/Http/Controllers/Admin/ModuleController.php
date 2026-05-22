<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('admin.modules.index', [
            'modules' => Module::latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.modules.create', ['module' => new Module()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['features'] = $this->featuresFromText($request->input('features_text'));
        $data['status'] = $request->boolean('status');
        $data['image'] = $request->file('image')?->store('modules', 'public');

        Module::create($data);

        return redirect()->route('admin.modules.index')->with('status', 'Module created.');
    }

    public function edit(Module $module)
    {
        return view('admin.modules.edit', ['module' => $module]);
    }

    public function update(Request $request, Module $module)
    {
        $data = $this->validated($request);
        $data['features'] = $this->featuresFromText($request->input('features_text'));
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('modules', 'public');
        }

        $module->update($data);

        return redirect()->route('admin.modules.index')->with('status', 'Module updated.');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return back()->with('status', 'Module deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:180'],
            'short_description' => ['required', 'string', 'max:500'],
            'full_description' => ['required', 'string'],
            'features_text' => ['nullable', 'string'],
            'pricing_text' => ['nullable', 'string'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function featuresFromText(?string $features): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $features))
            ->map(fn ($feature) => trim($feature))
            ->filter()
            ->values()
            ->all();
    }
}
