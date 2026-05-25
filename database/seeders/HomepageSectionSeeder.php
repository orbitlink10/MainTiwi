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
        ];

        foreach ($sections as $section) {
            HomepageSection::updateOrCreate(
                ['key' => $section['key']],
                $section + ['image' => null, 'status' => true]
            );
        }
    }
}
