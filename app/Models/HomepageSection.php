<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomepageSection extends Model
{
    /** @use HasFactory<\Database\Factories\HomepageSectionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'label',
        'heading',
        'body',
        'payload',
        'image',
        'sort_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'status' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('sort_order');
    }
}
