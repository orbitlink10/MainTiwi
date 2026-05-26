<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'key' => 'header_navigation',
                'label' => 'Header Navigation',
                'heading' => 'Logo and Navigation Menus',
                'body' => null,
                'payload' => [
                    'menu_items' => [
                        ['label' => 'Products', 'url' => '/solutions', 'children' => [
                            ['label' => 'POS System', 'url' => '/solutions'],
                            ['label' => 'Property Management', 'url' => '/solutions'],
                            ['label' => 'School Management', 'url' => '/solutions'],
                            ['label' => 'Manufacturing System', 'url' => '/solutions'],
                        ]],
                        ['label' => 'Customers', 'url' => '/about-tiwi', 'children' => [
                            ['label' => 'Business Teams', 'url' => '/about-tiwi'],
                            ['label' => 'Schools', 'url' => '/about-tiwi'],
                            ['label' => 'Property Managers', 'url' => '/about-tiwi'],
                        ]],
                        ['label' => 'Partners', 'url' => '/contact', 'children' => [
                            ['label' => 'Become a Partner', 'url' => '/contact'],
                            ['label' => 'Request a Demo', 'url' => '/contact'],
                        ]],
                        ['label' => 'Resources', 'url' => '/blog', 'children' => [
                            ['label' => 'Blog', 'url' => '/blog'],
                            ['label' => 'Pricing', 'url' => '/pricing'],
                            ['label' => 'Contact', 'url' => '/contact'],
                        ]],
                    ],
                ],
                'sort_order' => 0,
            ],
            [
                'key' => 'hero',
                'label' => 'Hero',
                'heading' => "Your life's work,\npowered by our life's work",
                'body' => "A unique and powerful software suite to transform the way you work.\nDesigned for businesses of all sizes, built by a company that values your privacy.",
                'payload' => ['primary_cta' => 'Get started for free', 'secondary_cta' => 'Contact us'],
                'sort_order' => 1,
            ],
            [
                'key' => 'why',
                'label' => 'Why Choose Tiwi',
                'heading' => 'One brand gateway for many operational tools',
                'body' => 'Tiwi keeps the public website, SEO pages, product details, blog content, and contact leads in one Laravel dashboard.',
                'payload' => ['points' => ['Centralized module marketing', 'Clean external access links', 'Admin-managed content', 'SEO-ready page structure']],
                'sort_order' => 2,
            ],
            [
                'key' => 'testimonials',
                'label' => 'Testimonials',
                'heading' => 'Built for practical teams',
                'body' => 'Tiwi makes it easier for teams to understand the right software module and start the right conversation.',
                'payload' => ['quotes' => ['The module pages make comparison simple.', 'The dashboard keeps our web updates fast.']],
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

        foreach ($sections as $section) {
            HomepageSection::updateOrCreate(
                ['key' => $section['key']],
                $section + ['image' => null, 'status' => true]
            );
        }
    }
}
