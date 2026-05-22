<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'How Tiwi Connects Growing Business Systems',
                'excerpt' => 'A quick look at how Tiwi helps teams discover, compare, and access operational software modules.',
                'content' => 'Tiwi works as the central website and dashboard for software modules that solve specific business operations. Each module can be developed separately while Tiwi handles marketing, discovery, content, and access links.',
            ],
            [
                'title' => 'Choosing the Right Module for Your First Rollout',
                'excerpt' => 'Start with the operational workflow that creates the clearest business impact.',
                'content' => 'Retailers may begin with POS, schools with learner and fee records, clinics with patient flow, and manufacturers with stock and production controls. Tiwi keeps each option visible from one hub.',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['title' => $post['title']],
                $post + [
                    'featured_image' => null,
                    'meta_title' => $post['title'].' | Tiwi News',
                    'meta_description' => $post['excerpt'],
                    'status' => true,
                    'published_at' => now()->subDays(rand(1, 10)),
                ]
            );
        }
    }
}
