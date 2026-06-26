<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'image_alt_text',
        'heading',
        'type',
        'meta_title',
        'meta_description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Page $page) {
            if ($page->isDirty('title') || blank($page->slug)) {
                $page->slug = static::uniqueSlug($page->title, $page->id);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getAdminImageUrlAttribute(): ?string
    {
        if (! $this->featured_image) {
            return null;
        }

        if (Str::startsWith($this->featured_image, ['http://', 'https://'])) {
            return $this->featured_image;
        }

        $path = ltrim($this->featured_image, '/');

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        if (Storage::disk('public')->exists($path)) {
            return route('media.show', ['path' => $path]);
        }

        return asset($this->featured_image);
    }

    public function getAdminAltTextAttribute(): string
    {
        return $this->image_alt_text ?: $this->title;
    }

    public function getAdminTypeAttribute(): string
    {
        return $this->type ?: 'Post';
    }

    public function getPublicUrlAttribute(): string
    {
        return route('posts.public.show', $this->slug);
    }

    private static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $count = 2;

        while (static::withTrashed()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = "{$base}-{$count}";
            $count++;
        }

        return $slug;
    }
}
