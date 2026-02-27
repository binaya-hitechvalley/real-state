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

        return DataTables::eloquent($query)
            ->addColumn('property_title', function (PropertyFeature $feature) {
                return $feature->property->title ?? '-';
            })
            ->addColumn('action', function (PropertyFeature $feature) {
                $deleteUrl = route('admin.property-features.destroy', $feature->id);
                
                return '
                    <div class="flex items-center space-x-2">
                        <button onclick="editPropertyFeature(' . $feature->id . ', ' . $feature->property_id . ', \'' . addslashes($feature->title) . '\', \'' . addslashes($feature->description ?? '') . '\')" class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this feature?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
