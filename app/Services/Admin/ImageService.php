<?php

namespace App\Services\Admin;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class ImageService
{
    /**
     * Upload and create image for a model (morphOne or morphMany).
     *
     * @param Model $model The parent model (e.g., Slider, Property)
     * @param UploadedFile $file The uploaded image file
     * @param string $directory Directory to store the image
     * @param string|null $altText Alt text for the image
     * @param bool $isPrimary Whether this is the primary image
     * @return Image
     */
    public function uploadImage(
        Model $model,
        UploadedFile $file,
        string $directory,
        ?string $altText = null,
        bool $isPrimary = true
    ): Image {
        // Generate unique filename
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store the file
        $file->storeAs($directory, $fileName, 'public');

        // Create image record
        return $model->image()->create([
            'directory' => $directory,
            'file_name' => $fileName,
            'alt_text' => $altText,
            'is_primary' => $isPrimary,
        ]);
    }

    /**
     * Upload and create multiple images for a model (morphMany).
     *
     * @param Model $model The parent model
     * @param array $files Array of UploadedFile instances
     * @param string $directory Directory to store images
     * @param array|null $altTexts Array of alt texts (optional)
     * @param int|null $primaryIndex Index of the primary image
     * @return array Array of created Image models
     */
    public function uploadMultipleImages(
        Model $model,
        array $files,
        string $directory,
        ?array $altTexts = null,
        ?int $primaryIndex = 0
    ): array {
        $images = [];

        foreach ($files as $index => $file) {
            if ($file instanceof UploadedFile) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Store the file
                $file->storeAs($directory, $fileName, 'public');

                // Create image record
                $images[] = $model->images()->create([
                    'directory' => $directory,
                    'file_name' => $fileName,
                    'alt_text' => $altTexts[$index] ?? null,
                    'is_primary' => ($index === $primaryIndex),
                ]);
            }
        }

        return $images;
    }

    /**
     * Update image for morphOne relationship.
     * Deletes the old image and uploads the new one.
     *
     * @param Model $model The parent model
     * @param UploadedFile $file The new uploaded image file
     * @param string $directory Directory to store the image
     * @param string|null $altText Alt text for the image
     * @param bool $isPrimary Whether this is the primary image
     * @return Image
     */
    public function updateMorphOneImage(
        Model $model,
        UploadedFile $file,
        string $directory,
        ?string $altText = null,
        bool $isPrimary = true
    ): Image {
        // Delete old image if exists (morphOne)
        if ($model->image) {
            $this->deleteImage($model->image);
        }

        // Upload new image
        return $this->uploadImage($model, $file, $directory, $altText, $isPrimary);
    }

    /**
     * Update only alt text for an existing image.
     *
     * @param Image $image The image model
     * @param string|null $altText New alt text
     * @return Image
     */
    public function updateAltText(Image $image, ?string $altText): Image
    {
        $image->update(['alt_text' => $altText]);
        return $image->fresh();
    }

    /**
     * Delete image file from storage and database record.
     *
     * @param Image $image The image to delete
     * @return bool
     */
    public function deleteImage(Image $image): bool
    {
        // Delete file from storage
        $path = $image->directory . '/' . $image->file_name;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        // Delete image record from database
        return $image->delete();
    }

    /**
     * Delete multiple images.
     *
     * @param array $images Array of Image models
     * @return bool
     */
    public function deleteMultipleImages(array $images): bool
    {
        foreach ($images as $image) {
            if ($image instanceof Image) {
                $this->deleteImage($image);
            }
        }

        return true;
    }

    /**
     * Delete all images for a model.
     *
     * @param Model $model The parent model
     * @return bool
     */
    public function deleteAllImages(Model $model): bool
    {
        $images = $model->images;
        
        foreach ($images as $image) {
            $this->deleteImage($image);
        }

        return true;
    }

    /**
     * Set an image as primary for a model by image ID.
     * Unsets other images as primary (for morphMany).
     *
     * @param Model $model The parent model
     * @param int $imageId The image ID to set as primary
     * @return bool
     */
    public function setPrimaryImageById(Model $model, int $imageId): bool
    {
        $image = $model->images()->find($imageId);
        
        if (!$image) {
            return false;
        }

        // Unset all images as primary
        $model->images()->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);

        return true;
    }

    /**
     * Set an image as primary for a model.
     * Unsets other images as primary (for morphMany).
     *
     * @param Model $model The parent model
     * @param Image $image The image to set as primary
     * @return Image
     */
    public function setPrimaryImage(Model $model, Image $image): Image
    {
        // Unset all images as primary
        $model->images()->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);

        return $image->fresh();
    }

    /**
     * Get the primary image for a model.
     *
     * @param Model $model The parent model
     * @return Image|null
     */
    public function getPrimaryImage(Model $model): ?Image
    {
        return $model->images()->where('is_primary', true)->first();
    }

    /**
     * Replace an existing image with a new one.
     *
     * @param Image $oldImage The image to replace
     * @param UploadedFile $file The new uploaded image file
     * @param string|null $altText Alt text for new image
     * @return Image
     */
    public function replaceImage(
        Image $oldImage,
        UploadedFile $file,
        ?string $altText = null
    ): Image {
        $model = $oldImage->imageable;
        $directory = $oldImage->directory;
        $isPrimary = $oldImage->is_primary;

        // Delete old image
        $this->deleteImage($oldImage);

        // Upload new image
        return $this->uploadImage($model, $file, $directory, $altText, $isPrimary);
    }
}
