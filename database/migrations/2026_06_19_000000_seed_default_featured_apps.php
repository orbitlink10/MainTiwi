<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $apps = [
            [
                'name' => 'POS',
                'aliases' => ['POS System'],
                'short_description' => 'Complete point-of-sale software for retail, inventory, branches, and sales reporting.',
                'full_description' => 'Tiwi POS helps retailers process sales, track inventory movement, monitor branch performance, manage receipts, and connect staff to the operational tools they use every day.',
                'features' => ['Sales checkout', 'Inventory tracking', 'Branch reporting', 'Customer accounts'],
                'pricing_text' => 'From KES 2,500 per month per outlet.',
                'external_url' => 'https://example.com/tiwi-pos',
            ],
            [
                'name' => 'Property',
                'aliases' => ['Property Management System', 'Rental Management System'],
                'short_description' => 'Manage tenants, units, rent collection, service requests, and property records.',
                'full_description' => 'Tiwi Property helps landlords, agencies, and property teams track occupancy, rent payments, maintenance requests, leases, and property records from one workspace.',
                'features' => ['Tenant records', 'Rent tracking', 'Maintenance requests', 'Lease management'],
                'pricing_text' => 'Custom pricing based on property volume.',
                'external_url' => 'https://example.com/tiwi-property',
            ],
            [
                'name' => 'School',
                'aliases' => ['School Management System'],
                'short_description' => 'Organize learners, fees, classes, exams, admissions, and school communication.',
                'full_description' => 'Tiwi School brings administrators, teachers, guardians, and learners into a single operational workspace for academic and finance workflows.',
                'features' => ['Student records', 'Fee tracking', 'Class timetables', 'Parent communication'],
                'pricing_text' => 'Per school pricing available on request.',
                'external_url' => 'https://example.com/tiwi-school',
            ],
            [
                'name' => 'Trips',
                'aliases' => ['Itinerary Builder'],
                'short_description' => 'Build travel plans, quotes, day-by-day routes, and polished client proposals.',
                'full_description' => 'Tiwi Trips helps tour operators assemble travel plans, collaborate on itinerary details, build quotes, and send polished client proposals linked from the Tiwi hub.',
                'features' => ['Day planner', 'Quote builder', 'Destination library', 'Shareable proposals'],
                'pricing_text' => 'Starter and agency plans available.',
                'external_url' => 'https://example.com/tiwi-itinerary',
            ],
            [
                'name' => 'Manufacturing',
                'aliases' => ['Manufacturing Management System', 'Manufacturing System'],
                'short_description' => 'Plan production, materials, work orders, costing, and finished-goods movement.',
                'full_description' => 'Tiwi Manufacturing is positioned for growing factories that need practical production planning, raw material visibility, and finished goods controls.',
                'features' => ['Bills of material', 'Work orders', 'Production costing', 'Stock movement'],
                'pricing_text' => 'Custom pricing for production teams.',
                'external_url' => 'https://example.com/tiwi-manufacturing',
            ],
            [
                'name' => 'Tiwi One',
                'aliases' => [],
                'short_description' => 'A unified business software suite for product discovery, access, and growth.',
                'full_description' => 'Tiwi One brings the product catalogue, business software access paths, content, and growth workflows into one unified suite for teams comparing and launching Tiwi products.',
                'features' => ['Product discovery', 'Central access hub', 'Content management', 'Growth workflows'],
                'pricing_text' => 'Contact Tiwi for suite pricing and implementation guidance.',
                'external_url' => 'https://example.com/tiwi-one',
            ],
        ];

        foreach ($apps as $app) {
            $slug = Str::slug($app['name']);
            $aliasSlugs = collect($app['aliases'])
                ->map(fn (string $alias) => Str::slug($alias))
                ->all();

            if (DB::table('modules')->where('slug', $slug)->exists()) {
                continue;
            }

            $data = [
                'name' => $app['name'],
                'slug' => $slug,
                'short_description' => $app['short_description'],
                'full_description' => $app['full_description'],
                'features' => json_encode($app['features']),
                'pricing_text' => $app['pricing_text'],
                'external_url' => $app['external_url'],
                'meta_title' => $app['name'].' | Tiwi Business Software',
                'meta_description' => $app['short_description'],
                'status' => true,
                'updated_at' => now(),
            ];

            $existingId = DB::table('modules')
                ->whereIn('slug', $aliasSlugs)
                ->orWhereIn('name', $app['aliases'])
                ->orderBy('id')
                ->value('id');

            if ($existingId) {
                DB::table('modules')->where('id', $existingId)->update($data);
                continue;
            }

            DB::table('modules')->insert($data + ['created_at' => now()]);
        }
    }

    public function down(): void
    {
        //
    }
};
