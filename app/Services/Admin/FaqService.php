<?php

namespace App\Services\Admin;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;

class FaqService
{
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = Faq::query();

        if (!empty($filters['question'])) {
            $query->where('question', 'like', '%' . $filters['question'] . '%');
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

    public function find(int $id): ?Faq
    {
        return Faq::find($id);
    }

    public function create(array $data): Faq
    {
        return DB::transaction(function () use ($data) {
            return Faq::create($data);
        });
    }

    public function update(Faq $faq, array $data): Faq
    {
        return DB::transaction(function () use ($faq, $data) {
            $faq->update($data);
            return $faq->fresh();
        });
    }

    public function delete(Faq $faq): bool
    {
        return DB::transaction(function () use ($faq) {
            return $faq->delete();
        });
    }
}
