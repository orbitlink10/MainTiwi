<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
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
                'name' => 'Property Management System',
                'aliases' => ['Rental Management System'],
                'short_description' => 'Manage units, tenants, rent collection, service requests, and property records.',
                'full_description' => 'Tiwi Property Management helps landlords, agencies, and property teams track occupancy, rent payments, maintenance requests, leases, and property records from one workspace.',
                'features' => ['Tenant records', 'Rent tracking', 'Maintenance requests', 'Lease management'],
                'pricing_text' => 'Custom pricing based on property volume.',
                'external_url' => 'https://example.com/tiwi-property',
            ],
            [
                'name' => 'School Management System',
                'aliases' => [],
                'short_description' => 'A connected platform for admissions, learners, fees, classes, and reports.',
                'full_description' => 'Tiwi School Management brings administrators, teachers, guardians, and learners into a single operational workspace for academic and finance workflows.',
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
                'name' => 'Manufacturing Management System',
                'aliases' => ['Manufacturing System'],
                'short_description' => 'Plan production, materials, work orders, costing, and stock movement.',
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

        foreach ($modules as $module) {
            $aliases = $module['aliases'];
            unset($module['aliases']);

            $record = Module::where('name', $module['name'])
                ->orWhereIn('name', $aliases)
                ->orWhere('slug', \Illuminate\Support\Str::slug($module['name']))
                ->orWhereIn('slug', collect($aliases)->map(fn ($alias) => \Illuminate\Support\Str::slug($alias))->all())
                ->orderBy('id')
                ->first();

            $record ??= new Module();
            $record->fill($module + [
                    'image' => null,
                    'meta_title' => $module['name'].' | Tiwi Business Software',
                    'meta_description' => $module['short_description'],
                    'status' => true,
                ]);
            $record->save();

            Module::whereKeyNot($record->id)
                ->where(fn ($query) => $query
                    ->where('name', $module['name'])
                    ->orWhereIn('name', $aliases)
                    ->orWhere('slug', \Illuminate\Support\Str::slug($module['name']))
                    ->orWhereIn('slug', collect($aliases)->map(fn ($alias) => \Illuminate\Support\Str::slug($alias))->all()))
                ->delete();
        }
    }
}
