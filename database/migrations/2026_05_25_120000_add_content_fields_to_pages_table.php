<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('image_alt_text')->nullable()->after('featured_image');
            $table->string('heading')->nullable()->after('image_alt_text');
            $table->string('type')->default('Post')->after('heading');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['image_alt_text', 'heading', 'type']);
        });
    }
};
