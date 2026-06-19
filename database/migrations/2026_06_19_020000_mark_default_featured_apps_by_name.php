<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('modules')
            ->whereIn('name', ['POS', 'Property', 'School', 'Trips', 'Manufacturing', 'Tiwi One'])
            ->update(['is_featured' => true]);
    }

    public function down(): void
    {
        //
    }
};
