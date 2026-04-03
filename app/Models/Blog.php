<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'image_url',
        'image_id',
        'published_at',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image_url',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Boot method to auto-generate slug from title.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    /**
     * Relationship: image from images table (optional).
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * Scope: only active blogs.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: published blogs (published_at <= today).
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    /**
     * Scope: ordered by sort then date.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('published_at');
    }

    /**
     * Get the display image URL - prefers uploaded image over image_url.
     */
    public function getDisplayImageAttribute()
    {
        if ($this->image) {
            return $this->image->url;
        }
        return $this->image_url;
    }

    /**
     * Get the day from published_at.
     */
    public function getPublishedDayAttribute()
    {
        return $this->published_at ? $this->published_at->format('d') : '--';
    }

    /**
     * Get short month name from published_at.
     */
    public function getPublishedMonthAttribute()
    {
        return $this->published_at ? $this->published_at->format('M') : '--';
    }
}
