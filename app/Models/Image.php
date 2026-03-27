<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'directory',
        'file_name',
        'alt_text',
        'is_primary',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
        ];
    }

    /**
     * Get the parent imageable model (property, slider, etc.).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the full path of the image.
     */
    public function getFullPathAttribute(): string
    {
        return $this->directory 
            ? rtrim($this->directory, '/') . '/' . $this->file_name
            : $this->file_name;
    }

    /**
     * Get the URL of the image.
     */
    public function getUrlAttribute(): string
    {
        if (!$this->directory || !$this->file_name) {
            return '';
        }
        
        $path = $this->directory . '/' . $this->file_name;
        
        // Check if file exists in storage
        if (\Storage::disk('public')->exists($path)) {
            return \Storage::url($path);
        }
        
        // Fallback to asset helper
        return asset('storage/' . $path);
    }
}
