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
        $this->ensureDefaultSectionsExist();

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
        if ($homepage_section->key === 'header_navigation') {
            return $this->updateHeaderNavigation($request, $homepage_section);
        }

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

    private function updateHeaderNavigation(Request $request, HomepageSection $homepageSection)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:120'],
            'heading' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'menu_labels' => ['nullable', 'array'],
            'menu_labels.*' => ['nullable', 'string', 'max:80'],
            'menu_urls' => ['nullable', 'array'],
            'menu_urls.*' => ['nullable', 'string', 'max:255'],
        ]);

        $menuLabels = $request->input('menu_labels', []);
        $menuUrls = $request->input('menu_urls', []);
        $menuItems = collect($menuLabels)
            ->map(function ($label, $index) use ($menuUrls) {
                $label = trim((string) $label);
                $url = trim((string) ($menuUrls[$index] ?? ''));

                return $label && $url ? ['label' => $label, 'url' => $url] : null;
            })
            ->filter()
            ->values()
            ->all();

        $update = [
            'label' => $data['label'],
            'heading' => $data['heading'],
            'body' => null,
            'payload' => ['menu_items' => $menuItems],
            'sort_order' => $data['sort_order'],
            'status' => $request->boolean('status'),
        ];

        if ($request->hasFile('logo')) {
            $update['image'] = $request->file('logo')->store('homepage', 'public');
        }

        $homepageSection->update($update);

        return redirect()->route('admin.homepage-sections.index')->with('status', 'Header navigation updated.');
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

    private function ensureDefaultSectionsExist(): void
    {
        foreach ($this->defaultSections() as $section) {
            $homepageSection = HomepageSection::withTrashed()->firstOrNew(['key' => $section['key']]);

            if (! $homepageSection->exists) {
                $homepageSection->fill($section + ['image' => null, 'status' => true]);
                $homepageSection->save();
            } elseif ($homepageSection->trashed()) {
                $homepageSection->restore();
            }
        }
    }

    private function defaultSections(): array
    {
        return [
            [
                'key' => 'header_navigation',
                'label' => 'Header Navigation',
                'heading' => 'Logo and Navigation Menus',
                'body' => null,
                'payload' => [
                    'menu_items' => [
                        ['label' => 'Products', 'url' => '/solutions'],
                        ['label' => 'Customers', 'url' => '/about-tiwi'],
                        ['label' => 'Partners', 'url' => '/contact'],
                        ['label' => 'Resources', 'url' => '/blog'],
                    ],
                ],
                'sort_order' => 0,
            ],
            [
                'key' => 'hero',
                'label' => 'Hero Section',
                'heading' => "Your life's work,\npowered by our life's work",
                'body' => "A unique and powerful software suite to transform the way you work.\nDesigned for businesses of all sizes, built by a company that values your privacy.",
                'payload' => ['primary_cta' => 'Get started for free'],
                'sort_order' => 1,
            ],
            [
                'key' => 'why',
                'label' => 'All-in-one Suite Section',
                'heading' => 'One brand gateway for many operational tools',
                'body' => 'Tiwi keeps the public website, SEO pages, product details, blog content, and contact leads in one Laravel dashboard.',
                'payload' => ['eyebrow' => 'All-in-one suite', 'cta_label' => 'View pricing'],
                'sort_order' => 2,
            ],
            [
                'key' => 'testimonials',
                'label' => 'Testimonial Quote',
                'heading' => 'Built for practical teams',
                'body' => 'Tiwi makes it easier for teams to understand the right software module and start the right conversation.',
                'payload' => ['quotes' => ['The module pages make comparison simple.'], 'cite' => 'Tiwi implementation team'],
                'sort_order' => 3,
            ],
            [
                'key' => 'sliding_content',
                'label' => 'Sliding Homepage Content',
                'heading' => 'Helpful context for choosing Tiwi',
                'body' => '<h2>Built for practical business software decisions</h2><p>Tiwi gives every product a clear place on the website, while each operational system can keep its own dedicated workflow, users, and dashboard.</p><h3>One homepage, many product paths</h3><p>Use this section for longer sales copy, product explanations, buyer guidance, or customer education. Visitors can read through the content without the section taking over the whole page.</p><h3>Easy to update from the dashboard</h3><p>Edit this content from Homepage Content in the admin panel. Headings, paragraphs, links, and lists can be added without changing code.</p>',
                'payload' => [],
                'sort_order' => 4,
            ],
        ];
    }
}
