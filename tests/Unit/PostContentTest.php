<?php

namespace Tests\Unit;

use App\Models\Post;
use Tests\TestCase;

class PostContentTest extends TestCase
{
    public function test_admin_description_uses_fullest_body_field(): void
    {
        $post = new Post([
            'content' => 'Short imported summary.',
            'page_description' => '<p>Full published article body with the remaining sections.</p>',
            'excerpt' => 'Fallback excerpt.',
        ]);

        $this->assertSame(
            '<p>Full published article body with the remaining sections.</p>',
            $post->admin_description
        );
    }

    public function test_admin_description_falls_back_to_excerpt(): void
    {
        $post = new Post([
            'excerpt' => 'Fallback excerpt.',
        ]);

        $this->assertSame('Fallback excerpt.', $post->admin_description);
    }
}
