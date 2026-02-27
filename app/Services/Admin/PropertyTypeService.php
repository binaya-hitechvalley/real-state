<?php

namespace App\Services\Admin;

use App\Models\PropertyType;
use Illuminate\Support\Facades\DB;

class PropertyTypeService
{
    /**
     * Get paginated list of property types with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = PropertyType::query();

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
     * Get all property types.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return PropertyType::orderBy('name', 'asc')->get();
    }

    /**
     * Find a property type by ID.
     *
     * @param int $id
     * @return PropertyType|null
     */
    public function find(int $id): ?PropertyType
    {
        return PropertyType::find($id);
    }

    /**
     * Create a new property type.
     *
     * @param array $data
     * @return PropertyType
     */
    public function create(array $data): PropertyType
    {
        return DB::transaction(function () use ($data) {
            return PropertyType::create($data);
        });
    }

    /**
     * Update an existing property type.
     *
     * @param PropertyType $propertyType
     * @param array $data
     * @return PropertyType
     */
    public function update(PropertyType $propertyType, array $data): PropertyType
    {
        return DB::transaction(function () use ($propertyType, $data) {
            $propertyType->update($data);
            return $propertyType->fresh();
        });
    }

    /**
     * Delete a property type.
     *
     * @param PropertyType $propertyType
     * @return bool
     */
    public function delete(PropertyType $propertyType): bool
    {
        return DB::transaction(function () use ($propertyType) {
            return $propertyType->delete();
        });
    }
}
