<?php

namespace App\DataTables;

use App\Models\Property;
use Yajra\DataTables\Facades\DataTables;

class PropertiesDataTable
{
    /**
     * Build the DataTable.
     *
     * @return mixed
     */
    public function dataTable()
    {
        $query = Property::with(['propertyType', 'businessType', 'state', 'municipality', 'primaryImage']);

        // Apply filters
        if ($title = request('title')) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($propertyTypeId = request('property_type_id')) {
            $query->where('property_type_id', $propertyTypeId);
        }

        if ($businessTypeId = request('business_type_id')) {
            $query->where('business_type_id', $businessTypeId);
        }

        if ($stateId = request('state_id')) {
            $query->where('state_id', $stateId);
        }

        if ($status = request('status')) {
            $query->where('status', $status);
        }

        if (request('is_featured') !== null) {
            $query->where('is_featured', request('is_featured'));
        }

        return DataTables::eloquent($query)
            ->addColumn('image', function (Property $property) {
                if ($property->primaryImage) {
                    return '<img src="' . $property->primaryImage->url . '" alt="' . htmlspecialchars($property->title) . '" class="h-16 w-16 object-cover rounded">';
                }
                return '<div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center"><i class="fas fa-image text-gray-400"></i></div>';
            })
            ->addColumn('property_type', function (Property $property) {
                return $property->propertyType->name ?? '-';
            })
            ->addColumn('business_type', function (Property $property) {
                return $property->businessType->name ?? '-';
            })
            ->addColumn('location', function (Property $property) {
                $location = $property->state->name ?? '';
                if ($property->municipality) {
                    $location .= ', ' . $property->municipality->name;
                }
                return $location ?: '-';
            })
            ->addColumn('price_display', function (Property $property) {
                if ($property->price) {
                    $price = '$' . number_format($property->price, 2);
                    $period = '';
                    if ($property->price_period !== 'total') {
                        $period = ' /' . $property->price_period;
                    }
                    return $price . $period;
                }
                return '-';
            })
            ->addColumn('status_badge', function (Property $property) {
                $colors = [
                    'available' => 'bg-green-100 text-green-800',
                    'sold' => 'bg-red-100 text-red-800',
                    'rented' => 'bg-blue-100 text-blue-800',
                    'inactive' => 'bg-gray-100 text-gray-800',
                ];
                $color = $colors[$property->status] ?? 'bg-gray-100 text-gray-800';
                return '<span class="px-2 py-1 text-xs font-semibold rounded ' . $color . '">' . ucfirst($property->status) . '</span>';
            })
            ->addColumn('featured', function (Property $property) {
                $checked = $property->is_featured ? 'checked' : '';
                return '<label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" ' . $checked . ' onchange="toggleFeatured(' . $property->id . ', this)">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[\'\'] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>';
            })
            ->addColumn('action', function (Property $property) {
                $editUrl = route('admin.properties.edit', $property->id);
                $deleteUrl = route('admin.properties.destroy', $property->id);
                
                return '
                    <div class="flex items-center space-x-2">
                        <a href="' . $editUrl . '" class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this property?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['image', 'status_badge', 'featured', 'action'])
            ->make(true);
    }
}
