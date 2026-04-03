<?php

namespace App\Services\Admin;

use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class TestimonialService
{
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = Testimonial::query();

        if (!empty($filters['client_name'])) {
            $query->where('client_name', 'like', '%' . $filters['client_name'] . '%');
        }

        if (isset($filters['is_active']) && $filters['is_active'] !== '') {
            $query->where('is_active', $filters['is_active']);
        }

        if (!empty($filters['sort_by'])) {
            $direction = $filters['sort_direction'] ?? 'asc';
            $query->orderBy($filters['sort_by'], $direction);
        } else {
            $query->orderBy('sort_order');
        }

        return $query->paginate($perPage);
    }

    public function find(int $id): ?Testimonial
    {
        return Testimonial::find($id);
    }

    public function create(array $data): Testimonial
    {
        return DB::transaction(function () use ($data) {
            return Testimonial::create($data);
        });
    }

    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        return DB::transaction(function () use ($testimonial, $data) {
            $testimonial->update($data);
            return $testimonial->fresh();
        });
    }

    public function delete(Testimonial $testimonial): bool
    {
        return DB::transaction(function () use ($testimonial) {
            return $testimonial->delete();
        });
    }
}
