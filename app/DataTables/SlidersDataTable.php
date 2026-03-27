<?php

namespace App\DataTables;

use App\Models\Slider;
use Yajra\DataTables\Facades\DataTables;

class SlidersDataTable
{
    /**
     * Build the DataTable.
     *
     * @return mixed
     */
    public function dataTable()
    {
        $query = Slider::with('image')->ordered();
        $is_active = request('is_active');

        // Apply filters only if present
        $hasTitle = request()->filled('title');
        $hasActive = request()->filled('is_active');

        if ($hasTitle) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }
        if ($hasActive) {
            $query->where('is_active', request('is_active'));
        }

        return DataTables::eloquent($query)
            ->addColumn('bulk_select', function (Slider $slider) {
                return '<input type="checkbox" class="bulk-checkbox-item" data-slider-id="' . $slider->id . '">';
            })
            ->addColumn('drag_handle', function (Slider $slider) {
                return '<i class="fas fa-grip-vertical drag-handle"></i>';
            })
            ->addColumn('image', function (Slider $slider) {
                if ($slider->image) {
                    return '<a href="#" class="image-preview" data-image-url="' . $slider->image->url . '">
                        <img src="' . $slider->image->url . '" alt="' . $slider->image->alt_text . '" class="h-16 w-24 object-cover rounded cursor-pointer hover:opacity-80 transition">
                    </a>';
                }
                return '<span class="text-gray-400 text-sm">No image</span>';
            })
            ->addColumn('status', function (Slider $slider) {
                $statusClass = $slider->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                $statusText = $slider->is_active ? 'Active' : 'Inactive';
                return '<span class="px-3 py-1 text-xs ' . $statusClass . ' rounded-full status-toggle">' . $statusText . '</span>';
            })
            ->addColumn('action', function (Slider $slider) {
                $editUrl = route('admin.sliders.edit', $slider->id);
                $deleteUrl = route('admin.sliders.destroy', $slider->id);
                
                return '
                    <div class="flex items-center space-x-2">
                        <a href="' . $editUrl . '" class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="toggleStatus(' . $slider->id . ')" class="text-yellow-600 hover:text-yellow-900 status-toggle" title="Toggle Status">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this slider?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->editColumn('subtitle', function (Slider $slider) {
                return $slider->subtitle ?? '-';
            })
            ->rawColumns(['bulk_select', 'drag_handle', 'image', 'status', 'action'])
            ->setRowId('id')
            ->setRowAttr([
                'data-slider-id' => function (Slider $slider) {
                    return $slider->id;
                }
            ])
            ->make(true);
    }
}
