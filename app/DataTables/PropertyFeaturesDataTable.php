<?php

namespace App\DataTables;

use App\Models\PropertyFeature;
use Yajra\DataTables\Facades\DataTables;

class PropertyFeaturesDataTable
{
    /**
     * Build the DataTable.
     *
     * @return mixed
     */
    public function dataTable()
    {
        $query = PropertyFeature::with('property');

        // Apply filters
        if ($propertyId = request('property_id')) {
            $query->where('property_id', $propertyId);
        }

        if ($title = request('title')) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        // Advanced search
        if ($search = request('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('property', function($propertyQuery) use ($search) {
                      $propertyQuery->where('title', 'like', '%' . $search . '%');
                  });
            });
        }

        // Date range filter
        if ($dateFrom = request('date_from')) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo = request('date_to')) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Sorting
        $sortBy = request('sort_by', 'created_at');
        $sortOrder = request('sort_order', 'desc');
        
        if (in_array($sortBy, ['id', 'title', 'created_at', 'property_id'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        return DataTables::eloquent($query)
            ->addColumn('property_title', function (PropertyFeature $feature) {
                return $feature->property ? 
                    '<span class="font-medium">' . e($feature->property->title) . '</span>' : 
                    '<span class="text-gray-400">-</span>';
            })
            ->addColumn('created_at', function (PropertyFeature $feature) {
                return '<span class="text-sm">' . $feature->created_at->format('M d, Y H:i') . '</span>';
            })
            ->addColumn('description', function (PropertyFeature $feature) {
                $description = $feature->description ?? '-';
                if (strlen($description) > 50) {
                    return '<span title="' . e($description) . '">' . e(substr($description, 0, 50)) . '...</span>';
                }
                return '<span>' . e($description) . '</span>';
            })
            ->addColumn('action', function (PropertyFeature $feature) {
                $deleteUrl = route('admin.property-features.destroy', $feature->id);
                $title = addslashes($feature->title);
                $description = addslashes($feature->description ?? '');

                return '
                    <div class="flex items-center space-x-2">
                        <button onclick="editPropertyFeature(' . $feature->id . ', ' . $feature->property_id . ', \'' . $title . '\', \'' . $description . '\')" 
                                class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-1 rounded hover:bg-blue-50" 
                                title="Edit Feature">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="viewPropertyFeature(' . $feature->id . ')" 
                                class="text-green-600 hover:text-green-800 transition-colors duration-200 p-1 rounded hover:bg-green-50" 
                                title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this feature?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1 rounded hover:bg-red-50" 
                                    title="Delete Feature">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['property_title', 'created_at', 'description', 'action'])
            ->make(true);
    }
}
