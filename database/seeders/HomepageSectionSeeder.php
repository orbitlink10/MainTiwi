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
                'heading' => 'Business software modules connected through one Tiwi hub',
                'body' => 'Market, manage, and link to specialist systems for POS, property management, schools, travel itineraries, and manufacturing.',
                'payload' => ['primary_cta' => 'Explore modules', 'secondary_cta' => 'Contact us'],
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
