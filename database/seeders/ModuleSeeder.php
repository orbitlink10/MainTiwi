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
                'name' => 'Rental Management System',
                'short_description' => 'Manage rental assets, bookings, agreements, payments, and availability.',
                'full_description' => 'The rental module is designed for equipment, property, and vehicle rental operators that need visibility across reservations, billing, renewals, and asset utilization.',
                'features' => ['Booking calendar', 'Asset register', 'Contracts', 'Payment status'],
                'pricing_text' => 'Custom pricing based on asset volume.',
                'external_url' => 'https://example.com/tiwi-rental',
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
                'name' => 'Hotspot Billing System',
                'short_description' => 'Voucher, wallet, and billing tools for Wi-Fi hotspot operators.',
                'full_description' => 'Tiwi Hotspot Billing supports internet providers and venues that sell access through vouchers, wallets, plans, and reseller channels.',
                'features' => ['Voucher plans', 'Router integration', 'Customer wallets', 'Usage reporting'],
                'pricing_text' => 'From KES 3,000 per month.',
                'external_url' => 'https://example.com/tiwi-hotspot',
            ],
            [
                'name' => 'Hospital Management System',
                'short_description' => 'Patient registration, visits, billing, pharmacy, and clinical workflow support.',
                'full_description' => 'The hospital module gives clinics and hospitals a structured way to manage patient journeys from reception through care, billing, and reporting.',
                'features' => ['Patient files', 'OPD/IPD visits', 'Pharmacy stock', 'Billing reports'],
                'pricing_text' => 'Facility pricing available on request.',
                'external_url' => 'https://example.com/tiwi-hospital',
            ],
            [
                'name' => 'Manufacturing System',
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
