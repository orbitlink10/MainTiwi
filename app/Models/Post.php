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
            if (Schema::hasColumn($post->getTable(), 'slug') && ($post->isDirty('title') || $post->isDirty('page_title') || blank($post->slug))) {
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
        $path = $this->attributes['featured_image']
            ?? $this->attributes['image']
            ?? $this->attributes['image_path']
            ?? null;

        if (! $path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '/'])) {
            return $path;
        }

        return Storage::disk('public')->exists($path) ? Storage::url($path) : asset($path);
    }

    public function getAdminAltTextAttribute(): string
    {
        return $this->attributes['alt_text']
            ?? $this->attributes['image_alt_text']
            ?? $this->attributes['meta_title']
            ?? $this->admin_title
            ?? '';
    }

    public function getAdminTypeAttribute(): string
    {
        return $this->attributes['type'] ?? 'Post';
    }

    public function getAdminTitleAttribute(): string
    {
        return $this->attributes['title']
            ?? $this->attributes['page_title']
            ?? $this->attributes['heading_1']
            ?? $this->attributes['meta_title']
            ?? '';
    }

    public function getAdminDescriptionAttribute(): string
    {
        return $this->attributes['content']
            ?? $this->attributes['page_description']
            ?? $this->attributes['description']
            ?? $this->attributes['excerpt']
            ?? '';
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
}
