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
                'name' => 'POS System',
                'short_description' => 'Fast sales, inventory, receipt, and branch controls for retail teams.',
                'full_description' => 'Tiwi POS helps retailers process sales, track inventory movement, monitor branch performance, and connect staff to the operational tools they use every day.',
                'features' => ['Sales checkout', 'Inventory tracking', 'Branch reporting', 'Customer accounts'],
                'pricing_text' => 'From KES 2,500 per month per outlet.',
                'external_url' => 'https://example.com/tiwi-pos',
            ],
            [
                'name' => 'Property Management System',
                'short_description' => 'Manage units, tenants, rent collection, service requests, and property records.',
                'full_description' => 'Tiwi Property Management helps landlords, agencies, and property teams track occupancy, rent payments, maintenance requests, leases, and property records from one workspace.',
                'features' => ['Tenant records', 'Rent tracking', 'Maintenance requests', 'Lease management'],
                'pricing_text' => 'Custom pricing based on property volume.',
                'external_url' => 'https://example.com/tiwi-property',
            ],
            [
                'name' => 'School Management System',
                'short_description' => 'A connected platform for admissions, learners, fees, classes, and reports.',
                'full_description' => 'Tiwi School Management brings administrators, teachers, guardians, and learners into a single operational workspace for academic and finance workflows.',
                'features' => ['Student records', 'Fee tracking', 'Class timetables', 'Parent communication'],
                'pricing_text' => 'Per school pricing available on request.',
                'external_url' => 'https://example.com/tiwi-school',
            ],
            [
                'name' => 'Itinerary Builder',
                'short_description' => 'Create professional travel plans, quotes, routes, and day-by-day itineraries.',
                'full_description' => 'Tour operators can assemble trips, collaborate on itinerary details, and send polished proposals linked from the Tiwi hub.',
                'features' => ['Day planner', 'Quote builder', 'Destination library', 'Shareable proposals'],
                'pricing_text' => 'Starter and agency plans available.',
                'external_url' => 'https://example.com/tiwi-itinerary',
            ],
            [
                'name' => 'Manufacturing Management System',
                'short_description' => 'Plan production, materials, work orders, costing, and stock movement.',
                'full_description' => 'Tiwi Manufacturing is positioned for growing factories that need practical production planning, raw material visibility, and finished goods controls.',
                'features' => ['Bills of material', 'Work orders', 'Production costing', 'Stock movement'],
                'pricing_text' => 'Custom pricing for production teams.',
                'external_url' => 'https://example.com/tiwi-manufacturing',
            ],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(
                ['name' => $module['name']],
                $module + [
                    'image' => null,
                    'meta_title' => $module['name'].' | Tiwi Business Software',
                    'meta_description' => $module['short_description'],
                    'status' => true,
                ]
            );
        }
    }
}
