<?php

namespace App\Services\Admin;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogService
{
    public function getPaginatedList(array $filters = [], int $perPage = 15)
    {
        $query = Blog::query();

        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['category'])) {
            $query->where('category', 'like', '%' . $filters['category'] . '%');
        }

        if (!empty($filters['is_active']) && $filters['is_active'] !== '') {
            $query->where('is_active', $filters['is_active']);
        }

        if (!empty($filters['sort_by'])) {
            $direction = $filters['sort_direction'] ?? 'desc';
            $query->orderBy($filters['sort_by'], $direction);
        } else {
            $query->orderBy('sort_order')->orderByDesc('published_at');
        }

        return $query->paginate($perPage);
    }

    public function getAll()
    {
        return Blog::orderBy('sort_order')->orderByDesc('published_at')->get();
    }

    public function find(int $id): ?Blog
    {
        return Blog::find($id);
    }

    public function create(array $data): Blog
    {
        return DB::transaction(function () use ($data) {
            return Blog::create($data);
        });
    }

    public function update(Blog $blog, array $data): Blog
    {
        return DB::transaction(function () use ($blog, $data) {
            $blog->update($data);
            return $blog->fresh();
        });
    }

    public function delete(Blog $blog): bool
    {
        return DB::transaction(function () use ($blog) {
            return $blog->delete();
        });
    }
}
