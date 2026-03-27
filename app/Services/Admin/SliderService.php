<?php

namespace App\Services\Admin;

use App\Models\Slider;
use App\Services\Admin\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class SliderService
{
    protected $imageService;

    public function __construct(ImageService $imageService = null)
    {
        $this->imageService = $imageService ?: new ImageService();
    }
    /**
     * Get paginated list of sliders with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = Slider::with('image')->ordered();

        // Apply filters
        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        // Apply sorting
        if (!empty($filters['sort_by'])) {
            $direction = $filters['sort_direction'] ?? 'asc';
            $query->orderBy($filters['sort_by'], $direction);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get all active sliders ordered by order_column.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActiveSliders()
    {
        return Slider::with('image')->active()->ordered()->get();
    }

    /**
     * Find a slider by ID.
     *
     * @param int $id
     * @return Slider|null
     */
    public function find(int $id): ?Slider
    {
        return Slider::with('image')->find($id);
    }

    /**
     * Create a new slider.
     *
     * @param array $data
     * @return Slider
     */
    public function create(array $data): Slider
    {
        return DB::transaction(function () use ($data) {
            // Extract image data
            $imageFile = $data['image'] ?? null;
            $altText = $data['alt_text'] ?? null;
            unset($data['image'], $data['alt_text']);

            // Create slider
            $slider = Slider::create($data);

            // Handle image upload using ImageService
            if ($imageFile instanceof UploadedFile) {
                $this->imageService->uploadImage(
                    $slider,
                    $imageFile,
                    'sliders',
                    $altText ?? $slider->title,
                    true
                );
            }

            return $slider->load('image');
        });
    }

    /**
     * Update an existing slider.
     *
     * @param Slider $slider
     * @param array $data
     * @return Slider
     */
    public function update(Slider $slider, array $data): Slider
    {
        return DB::transaction(function () use ($slider, $data) {
            // Extract image data
            $imageFile = $data['image'] ?? null;
            $altText = $data['alt_text'] ?? null;
            unset($data['image'], $data['alt_text']);

            // Update slider
            $slider->update($data);

            // Handle image upload if new image provided
            if ($imageFile instanceof UploadedFile) {
                // Update image using ImageService (automatically deletes old image for morphOne)
                $this->imageService->updateMorphOneImage(
                    $slider,
                    $imageFile,
                    'sliders',
                    $altText ?? $slider->title,
                    true
                );
            } elseif ($altText !== null && $slider->image) {
                // Update alt text only
                $this->imageService->updateAltText($slider->image, $altText);
            }

            return $slider->load('image');
        });
    }

    /**
     * Delete a slider and its associated image.
     *
     * @param Slider $slider
     * @return bool
     */
    public function delete(Slider $slider): bool
    {
        return DB::transaction(function () use ($slider) {
            // Delete associated image using ImageService
            if ($slider->image) {
                $this->imageService->deleteImage($slider->image);
            }

            return $slider->delete();
        });
    }

    /**
     * Toggle slider active status.
     *
     * @param Slider $slider
     * @return Slider
     */
    public function toggleStatus(Slider $slider): Slider
    {
        $slider->update(['is_active' => !$slider->is_active]);
        return $slider;
    }

    /**
     * Update order for multiple sliders.
     *
     * @param array $order
     * @return bool
     */
    public function updateOrder(array $order): bool
    {
        return DB::transaction(function () use ($order) {
            foreach ($order as $index => $id) {
                Slider::where('id', $id)->update(['order_column' => $index + 1]);
            }
            return true;
        });
    }

    /**
     * Bulk update status for multiple sliders.
     *
     * @param array $ids
     * @param bool $status
     * @return bool
     */
    public function bulkUpdateStatus(array $ids, bool $status): bool
    {
        return DB::transaction(function () use ($ids, $status) {
            Slider::whereIn('id', $ids)->update(['is_active' => $status]);
            return true;
        });
    }

    /**
     * Bulk delete multiple sliders.
     *
     * @param array $ids
     * @return bool
     */
    public function bulkDelete(array $ids): bool
    {
        return DB::transaction(function () use ($ids) {
            $sliders = Slider::with('image')->whereIn('id', $ids)->get();
            
            foreach ($sliders as $slider) {
                // Delete associated image using ImageService
                if ($slider->image && $slider->image instanceof \App\Models\Image) {
                    $this->imageService->deleteImage($slider->image);
                }
                $slider->delete();
            }
            
            return true;
        });
    }
}
