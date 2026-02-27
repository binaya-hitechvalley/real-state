<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFeatureRequest;
use App\Services\Admin\PropertyFeatureService;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyFeatureController extends Controller
{
    protected PropertyFeatureService $propertyFeatureService;

    public function __construct(PropertyFeatureService $propertyFeatureService)
    {
        $this->propertyFeatureService = $propertyFeatureService;
    }

    /**
     * Display a listing of property features.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\PropertyFeaturesDataTable();
            return $dataTable->dataTable();
        }
        
        $properties = Property::orderBy('title')->get();
        
        return view('admin.property-features.index', compact('properties'));
    }

    /**
     * Store a newly created property feature in storage.
     */
    public function store(PropertyFeatureRequest $request)
    {
        $this->propertyFeatureService->create($request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Property feature created successfully.'
            ]);
        }
        
        return redirect()->route('admin.property-features.index')->with('success', 'Property feature created successfully.');
    }

    /**
     * Update the specified property feature in storage.
     */
    public function update(PropertyFeatureRequest $request, int $id)
    {
        $propertyFeature = $this->propertyFeatureService->find($id);
        $this->propertyFeatureService->update($propertyFeature, $request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Property feature updated successfully.'
            ]);
        }
        
        return redirect()->route('admin.property-features.index')->with('success', 'Property feature updated successfully.');
    }

    /**
     * Remove the specified property feature from storage.
     */
    public function destroy(int $id)
    {
        $propertyFeature = $this->propertyFeatureService->find($id);
        $this->propertyFeatureService->delete($propertyFeature);
        return redirect()->route('admin.property-features.index')->with('success', 'Property feature deleted successfully.');
    }
}
