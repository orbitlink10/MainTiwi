<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false)->after('status')->index();
        });

        DB::table('modules')
            ->whereIn('slug', ['pos', 'property', 'school', 'trips', 'manufacturing', 'tiwi-one'])
            ->update(['is_featured' => true]);
    }

    public function down(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};
