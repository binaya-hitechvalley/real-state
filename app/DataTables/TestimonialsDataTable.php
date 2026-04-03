<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Yajra\DataTables\Facades\DataTables;

class TestimonialsDataTable
{
    public function dataTable()
    {
        $query = Testimonial::query();

        if ($clientName = request('client_name')) {
            $query->where('client_name', 'like', '%' . $clientName . '%');
        }

        if (request('is_active') !== null && request('is_active') !== '') {
            $query->where('is_active', request('is_active'));
        }

        return DataTables::eloquent($query)
            ->addColumn('rating_display', function (Testimonial $testimonial) {
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= floor($testimonial->rating)) {
                        $stars .= '<i class="fas fa-star text-yellow-400 text-xs"></i>';
                    } elseif ($i == ceil($testimonial->rating) && $testimonial->rating != floor($testimonial->rating)) {
                        $stars .= '<i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>';
                    } else {
                        $stars .= '<i class="far fa-star text-yellow-400 text-xs"></i>';
                    }
                }
                return $stars . ' <span class="text-gray-500 text-xs">(' . $testimonial->rating . ')</span>';
            })
            ->addColumn('status', function (Testimonial $testimonial) {
                return $testimonial->is_active
                    ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>'
                    : '<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Inactive</span>';
            })
            ->addColumn('client_info', function (Testimonial $testimonial) {
                $photo = $testimonial->client_photo_url
                    ? '<img src="' . $testimonial->client_photo_url . '" class="w-8 h-8 rounded-full object-cover mr-2" alt="">'
                    : '<div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-2 text-blue-600 text-xs font-bold">' . strtoupper(substr($testimonial->client_name, 0, 1)) . '</div>';
                return '<div class="flex items-center">' . $photo . '<div><div class="font-medium">' . e($testimonial->client_name) . '</div><div class="text-xs text-gray-500">' . e($testimonial->client_designation ?? '') . '</div></div></div>';
            })
            ->addColumn('action', function (Testimonial $testimonial) {
                $deleteUrl = route('admin.testimonials.destroy', $testimonial->id);
                $editData = htmlspecialchars(json_encode([
                    'id' => $testimonial->id,
                    'client_name' => $testimonial->client_name,
                    'client_designation' => $testimonial->client_designation,
                    'client_photo_url' => $testimonial->client_photo_url,
                    'content' => $testimonial->content,
                    'rating' => $testimonial->rating,
                    'is_active' => $testimonial->is_active ? '1' : '0',
                    'sort_order' => $testimonial->sort_order,
                ]), ENT_QUOTES, 'UTF-8');

                return '
                    <div class="flex items-center space-x-2">
                        <button onclick=\'editTestimonial(' . $editData . ')\' class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this testimonial?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['rating_display', 'status', 'client_info', 'action'])
            ->make(true);
    }
}
