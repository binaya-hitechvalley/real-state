<?php

namespace App\Services\Admin;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class PropertyService
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Get all properties.
     */
    public function all(): Collection
    {
        return Property::with(['propertyType', 'businessType', 'state', 'municipality', 'primaryImage'])->get();
    }

    /**
     * Find a property by ID.
     */
    public function find(int $id): ?Property
    {
        return Property::with(['propertyType', 'businessType', 'state', 'municipality', 'images', 'features'])->findOrFail($id);
    }

    /**
     * Create a new property.
     */
    public function create(array $data): Property
    {
        // Handle images separately
        $images = $data['images'] ?? [];
        $primaryImageIndex = $data['primary_image_index'] ?? 0;
        unset($data['images'], $data['primary_image_index']);

        // Create property
        $property = Property::create($data);

        // Upload images
        if (!empty($images)) {
            $this->imageService->uploadMultipleImages($property, $images, 'properties', $primaryImageIndex);
        }

        return $property->load(['propertyType', 'businessType', 'state', 'municipality', 'images']);
    }

    /**
     * Update an existing property.
     */
    public function update(Property $property, array $data): Property
    {
        // Handle images separately
        $images = $data['images'] ?? [];
        $primaryImageIndex = $data['primary_image_index'] ?? null;
        unset($data['images'], $data['primary_image_index']);

        // Update property
        $property->update($data);

        // Upload new images if provided
        if (!empty($images)) {
            $this->imageService->uploadMultipleImages($property, $images, 'properties', $primaryImageIndex);
        } elseif ($primaryImageIndex !== null) {
            // Just update primary image if specified
            $this->imageService->setPrimaryImage($property, $primaryImageIndex);
        }

        return $property->load(['propertyType', 'businessType', 'state', 'municipality', 'images']);
    }

    /**
     * Delete a property.
     */
    public function delete(Property $property): bool
    {
        // Delete all associated images
        $this->imageService->deleteAllImages($property);

        return $property->delete();
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Property $property): Property
    {
        $property->update(['is_featured' => !$property->is_featured]);
        return $property;
    }

    /**
     * Update status.
     */
    public function updateStatus(Property $property, string $status): Property
    {
        $property->update(['status' => $status]);
        return $property;
    }

    /**
     * Delete a specific image from property.
     */
    public function deleteImage(Property $property, int $imageId): bool
    {
        $image = $property->images()->findOrFail($imageId);
        return $this->imageService->deleteImage($image);
    }

    /**
     * Set primary image.
     */
    public function setPrimaryImage(Property $property, int $imageId): bool
    {
        return $this->imageService->setPrimaryImageById($property, $imageId);
    }
}
