<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Tiwi',
                'content' => 'Tiwi is the central marketing website and access hub for a suite of business software modules built for POS, property management, school management, itinerary building, and manufacturing teams.',
            ],
            [
                'title' => 'Pricing',
                'content' => 'Tiwi modules can be priced independently so each business pays only for the systems it needs. Contact the Tiwi team for package recommendations and implementation pricing.',
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['title' => $page['title']],
                $page + [
                    'featured_image' => null,
                    'meta_title' => $page['title'].' | Tiwi',
                    'meta_description' => str($page['content'])->limit(155)->toString(),
                    'status' => true,
                ]
            );
        }
    }
}
