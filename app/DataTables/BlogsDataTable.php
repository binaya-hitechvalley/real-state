<?php

namespace App\DataTables;

use App\Models\Blog;
use Yajra\DataTables\Facades\DataTables;

class BlogsDataTable
{
    public function dataTable()
    {
        $query = Blog::query();

        if ($title = request('title')) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($category = request('category')) {
            $query->where('category', 'like', '%' . $category . '%');
        }

        if (request('is_active') !== null && request('is_active') !== '') {
            $query->where('is_active', request('is_active'));
        }

        return DataTables::eloquent($query)
            ->addColumn('status', function (Blog $blog) {
                return $blog->is_active
                    ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>'
                    : '<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Inactive</span>';
            })
            ->addColumn('published', function (Blog $blog) {
                return $blog->published_at ? $blog->published_at->format('M d, Y') : '<span class="text-gray-400">Draft</span>';
            })
            ->addColumn('action', function (Blog $blog) {
                $editUrl = route('admin.blogs.edit', $blog->id);
                $deleteUrl = route('admin.blogs.destroy', $blog->id);

                return '
                    <div class="flex items-center space-x-2">
                        <a href="' . $editUrl . '" class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this blog?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['status', 'published', 'action'])
            ->make(true);
    }
}
