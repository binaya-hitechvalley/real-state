<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_designation',
        'client_photo_url',
        'content',
        'rating',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'float',
        'is_active' => 'boolean',
    ];

    /**
     * Scope: only active testimonials.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: ordered by sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Get the full star count (integer).
     */
    public function getFullStarsAttribute()
    {
        return (int) floor($this->rating);
    }

    /**
     * Check if there is a half star.
     */
    public function getHasHalfStarAttribute()
    {
        return ($this->rating - floor($this->rating)) >= 0.5;
    }

    /**
     * Get empty star count.
     */
    public function getEmptyStarsAttribute()
    {
        $filled = $this->full_stars + ($this->has_half_star ? 1 : 0);
        return max(0, 5 - $filled);
    }
}
