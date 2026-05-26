<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I choose the right Tiwi product?',
                'answer' => 'Start with the workflow that needs the fastest improvement. Retail teams usually begin with POS, schools with learner and fee management, property teams with tenant records, and travel teams with itinerary planning.',
            ],
            [
                'question' => 'Can each product link to a separate system?',
                'answer' => 'Yes. Tiwi can market every product from one website while sending visitors to the correct external dashboard, demo, or production system for that product.',
            ],
            [
                'question' => 'Can I update website content from the dashboard?',
                'answer' => 'Yes. The admin dashboard manages homepage sections, pages, products, blog posts, contact messages, and FAQs without editing code.',
            ],
            [
                'question' => 'Is the homepage content mobile friendly?',
                'answer' => 'Yes. Public pages are structured to work across phone, tablet, and desktop screen sizes.',
            ],
            [
                'question' => 'Can I hide an FAQ without deleting it?',
                'answer' => 'Yes. Turn off the Active checkbox in the FAQ editor and it will stay in the dashboard without appearing on the homepage.',
            ],
            [
                'question' => 'How are FAQs ordered on the homepage?',
                'answer' => 'Use the Sort order field in the dashboard. Lower numbers appear first.',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq + ['sort_order' => $index + 1, 'status' => true]
            );
        }
    }
}
