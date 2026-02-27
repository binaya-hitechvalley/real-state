<?php

namespace App\Services\Admin;

use App\Models\PropertyFeature;
use Illuminate\Database\Eloquent\Collection;

class PropertyFeatureService
{
    /**
     * Get all property features.
     */
    public function all(): Collection
    {
        return PropertyFeature::with('property')->get();
    }

    /**
     * Get features by property ID.
     */
    public function getByProperty(int $propertyId): Collection
    {
        return PropertyFeature::where('property_id', $propertyId)->get();
    }

    /**
     * Find a property feature by ID.
     */
    public function find(int $id): ?PropertyFeature
    {
        return PropertyFeature::with('property')->findOrFail($id);
    }

    /**
     * Create a new property feature.
     */
    public function create(array $data): PropertyFeature
    {
        return PropertyFeature::create($data);
    }

    /**
     * Update an existing property feature.
     */
    public function update(PropertyFeature $propertyFeature, array $data): PropertyFeature
    {
        $propertyFeature->update($data);
        return $propertyFeature;
    }

    /**
     * Delete a property feature.
     */
    public function delete(PropertyFeature $propertyFeature): bool
    {
        return $propertyFeature->delete();
    }
}
