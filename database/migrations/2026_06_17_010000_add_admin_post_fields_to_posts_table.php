<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('posts')) {
            return;
        }

        Schema::table('posts', function (Blueprint $table) {
            if (! Schema::hasColumn('posts', 'page_title')) {
                $table->string('page_title')->nullable();
            }

            if (! Schema::hasColumn('posts', 'keyword_title')) {
                $table->string('keyword_title')->nullable();
            }

            if (! Schema::hasColumn('posts', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }

            if (! Schema::hasColumn('posts', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }

            if (! Schema::hasColumn('posts', 'alt_text')) {
                $table->string('alt_text')->nullable();
            }

            if (! Schema::hasColumn('posts', 'heading_2')) {
                $table->string('heading_2')->nullable();
            }

            if (! Schema::hasColumn('posts', 'heading2')) {
                $table->string('heading2')->nullable();
            }

            if (! Schema::hasColumn('posts', 'type')) {
                $table->string('type')->default('Post');
            }

            if (! Schema::hasColumn('posts', 'page_description')) {
                $table->longText('page_description')->nullable();
            }

            if (! Schema::hasColumn('posts', 'body')) {
                $table->longText('body')->nullable();
            }

            if (! Schema::hasColumn('posts', 'image')) {
                $table->string('image')->nullable();
            }

            if (! Schema::hasColumn('posts', 'status')) {
                $table->boolean('status')->default(true)->index();
            }

            if (! Schema::hasColumn('posts', 'published_at')) {
                $table->timestamp('published_at')->nullable()->index();
            }

            if (! Schema::hasColumn('posts', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }

            if (! Schema::hasColumn('posts', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep this conservative because deployments may already have a posts table.
    }
};
