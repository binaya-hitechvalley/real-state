<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PropertyType extends Model
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

        static::creating(function ($propertyType) {
            if (empty($propertyType->slug)) {
                $propertyType->slug = Str::slug($propertyType->name);
            }
        });

        static::updating(function ($propertyType) {
            if ($propertyType->isDirty('name') && empty($propertyType->slug)) {
                $propertyType->slug = Str::slug($propertyType->name);
            }
        });
    }

    /**
     * Get the properties for this property type.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
