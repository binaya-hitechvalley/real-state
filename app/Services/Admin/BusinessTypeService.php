<?php

namespace App\Services\Admin;

use App\Models\BusinessType;
use Illuminate\Support\Facades\DB;

class BusinessTypeService
{
    /**
     * Get paginated list of business types with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = BusinessType::query();

        // Apply filters
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // Apply sorting
        if (!empty($filters['sort_by'])) {
            $direction = $filters['sort_direction'] ?? 'asc';
            $query->orderBy($filters['sort_by'], $direction);
        } else {
            $query->orderBy('name', 'asc');
        }

        return $query->paginate($perPage);
    }

    /**
     * Get all business types.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return BusinessType::orderBy('name', 'asc')->get();
    }

    /**
     * Find a business type by ID.
     *
     * @param int $id
     * @return BusinessType|null
     */
    public function find(int $id): ?BusinessType
    {
        return BusinessType::find($id);
    }

    /**
     * Create a new business type.
     *
     * @param array $data
     * @return BusinessType
     */
    public function create(array $data): BusinessType
    {
        return DB::transaction(function () use ($data) {
            return BusinessType::create($data);
        });
    }

    /**
     * Update an existing business type.
     *
     * @param BusinessType $businessType
     * @param array $data
     * @return BusinessType
     */
    public function update(BusinessType $businessType, array $data): BusinessType
    {
        return DB::transaction(function () use ($businessType, $data) {
            $businessType->update($data);
            return $businessType->fresh();
        });
    }

    /**
     * Delete a business type.
     *
     * @param BusinessType $businessType
     * @return bool
     */
    public function delete(BusinessType $businessType): bool
    {
        return DB::transaction(function () use ($businessType) {
            return $businessType->delete();
        });
    }
}
