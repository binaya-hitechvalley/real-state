<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFeature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'title',
        'description',
    ];

    /**
     * Get the property that owns the feature.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
