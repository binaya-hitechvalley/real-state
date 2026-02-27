<?php

namespace App\DataTables;

use App\Models\BusinessType;
use Yajra\DataTables\Facades\DataTables;

class BusinessTypesDataTable
{
    /**
     * Build the DataTable.
     *
     * @return mixed
     */
    public function dataTable()
    {
        $query = BusinessType::query();

        // Apply filters
        if ($name = request('name')) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        return DataTables::eloquent($query)
            ->addColumn('action', function (BusinessType $businessType) {
                $deleteUrl = route('admin.business-types.destroy', $businessType->id);
                
                return '
                    <div class="flex items-center space-x-2">
                        <button onclick="editBusinessType(' . $businessType->id . ', \'' . addslashes($businessType->name) . '\', \'' . addslashes($businessType->slug) . '\')" class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this business type?\');">
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
