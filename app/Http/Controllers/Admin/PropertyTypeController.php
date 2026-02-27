<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyTypeRequest;
use App\Services\Admin\PropertyTypeService;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    protected PropertyTypeService $propertyTypeService;

    public function __construct(PropertyTypeService $propertyTypeService)
    {
        $this->propertyTypeService = $propertyTypeService;
    }

    /**
     * Display a listing of property types.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\PropertyTypesDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.property-types.index');
    }

    /**
     * Store a newly created property type in storage.
     */
    public function store(PropertyTypeRequest $request)
    {
        $this->propertyTypeService->create($request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Property type created successfully.'
            ]);
        }
        
        return redirect()->route('admin.property-types.index')->with('success', 'Property type created successfully.');
    }

    /**
     * Update the specified property type in storage.
     */
    public function update(PropertyTypeRequest $request, int $id)
    {
        $propertyType = $this->propertyTypeService->find($id);
        $this->propertyTypeService->update($propertyType, $request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Property type updated successfully.'
            ]);
        }
        
        return redirect()->route('admin.property-types.index')->with('success', 'Property type updated successfully.');
    }

    /**
     * Remove the specified property type from storage.
     */
    public function destroy(int $id)
    {
        $propertyType = $this->propertyTypeService->find($id);
        $this->propertyTypeService->delete($propertyType);
        return redirect()->route('admin.property-types.index')->with('success', 'Property type deleted successfully.');
    }
}
