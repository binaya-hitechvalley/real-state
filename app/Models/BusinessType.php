<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class BusinessType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($businessType) {
            if (empty($businessType->slug)) {
                $businessType->slug = Str::slug($businessType->name);
            }
        });

        static::updating(function ($businessType) {
            if ($businessType->isDirty('name') && empty($businessType->slug)) {
                $businessType->slug = Str::slug($businessType->name);
            }
        });
    }

    /**
     * Get the properties for this business type.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
