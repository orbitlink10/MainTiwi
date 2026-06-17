<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function usesTimestamps(): bool
    {
        return Schema::hasColumn($this->getTable(), static::CREATED_AT)
            && Schema::hasColumn($this->getTable(), static::UPDATED_AT);
    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (Schema::hasColumn($post->getTable(), 'slug') && blank($post->slug)) {
                $post->slug = static::uniqueSlug($post->admin_title, $post->id);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function getAdminImageUrlAttribute(): ?string
    {
        $path = $this->firstAttribute([
            'featured_image',
            'image',
            'image_path',
            'photo',
            'thumbnail',
            'banner',
        ]);

        if (! $path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $normalized = ltrim($path, '/');

        if (Str::startsWith($normalized, 'storage/')) {
            $storagePath = Str::after($normalized, 'storage/');

            if (Storage::disk('public')->exists($storagePath)) {
                return route('media.show', ['path' => $storagePath]);
            }
        }

        if (Storage::disk('public')->exists($normalized)) {
            return route('media.show', ['path' => $normalized]);
        }

        foreach ([
            $normalized,
            "storage/{$normalized}",
            "uploads/{$normalized}",
            "images/{$normalized}",
            "posts/{$normalized}",
        ] as $candidate) {
            if (is_file(public_path($candidate))) {
                return asset($candidate);
            }
        }

        if (str_contains($normalized, '/')) {
            return asset($normalized);
        }

        return null;
    }

    public function getAdminAltTextAttribute(): string
    {
        return $this->firstAttribute([
            'alt_text',
            'image_alt_text',
            'image_alt',
            'alt',
            'meta_title',
        ]) ?: $this->admin_title;
    }

    public function getAdminTypeAttribute(): string
    {
        return $this->firstAttribute(['type', 'post_type', 'page_type']) ?: 'Post';
    }

    public function getAdminTitleAttribute(): string
    {
        return $this->firstAttribute([
            'title',
            'page_title',
            'keyword_title',
            'post_title',
            'heading_1',
            'heading1',
            'name',
            'meta_title',
        ]);
    }

    public function getAdminDescriptionAttribute(): string
    {
        return $this->firstAttribute([
            'content',
            'page_description',
            'description',
            'body',
            'details',
            'long_description',
            'post_content',
            'desc',
            'excerpt',
        ]);
    }

    public function getAdminHeading2Attribute(): string
    {
        return $this->firstAttribute([
            'heading_2',
            'heading2',
            'sub_heading',
            'subheading',
            'subtitle',
        ]);
    }

    public function getPublicSlugAttribute(): string
    {
        return $this->attributes['slug'] ?? Str::slug($this->admin_title);
    }

    public function getPublicUrlAttribute(): string
    {
        return route('posts.public.show', $this->public_slug);
    }

    private static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $count = 2;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = "{$base}-{$count}";
            $count++;
        }

        return $slug;
    }

    private function firstAttribute(array $keys): string
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $this->attributes) && filled($this->attributes[$key])) {
                return (string) $this->attributes[$key];
            }
        }

        return '';
    }
}
