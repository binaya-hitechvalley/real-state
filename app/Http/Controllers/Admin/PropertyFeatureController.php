<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFeatureRequest;
use App\Services\Admin\PropertyFeatureService;
use App\Models\Property;
use App\Models\PropertyFeature;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::orderBy('title')->get();
        return view('admin.property-features.create', compact('properties'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $propertyFeature = $this->propertyFeatureService->find($id);
        return view('admin.property-features.show', compact('propertyFeature'));
    }

    /**
     * Show the form for editing the specified property feature.
     */
    public function edit(int $id)
    {
        $propertyFeature = $this->propertyFeatureService->find($id);
        $properties = Property::orderBy('title')->get();
        return view('admin.property-features.edit', compact('propertyFeature', 'properties'));
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

    /**
     * Bulk delete property features.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:property_features,id'
        ]);

        $deletedCount = PropertyFeature::whereIn('id', $request->ids)->delete();
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $deletedCount . ' property features deleted successfully.'
            ]);
        }

        return redirect()->route('admin.property-features.index')
            ->with('success', $deletedCount . ' property features deleted successfully.');
    }

    /**
     * Bulk update property features.
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:property_features,id',
            'property_id' => 'nullable|integer|exists:properties,id'
        ]);

        $updateData = [];
        if ($request->has('property_id')) {
            $updateData['property_id'] = $request->property_id;
        }

        if (empty($updateData)) {
            return response()->json([
                'success' => false,
                'message' => 'No fields to update.'
            ], 400);
        }

        $updatedCount = PropertyFeature::whereIn('id', $request->ids)->update($updateData);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $updatedCount . ' property features updated successfully.'
            ]);
        }

        return redirect()->route('admin.property-features.index')
            ->with('success', $updatedCount . ' property features updated successfully.');
    }

    /**
     * Get property feature details for view modal.
     */
    public function getFeatureDetails(int $id)
    {
        $propertyFeature = $this->propertyFeatureService->find($id);
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $propertyFeature->id,
                'title' => $propertyFeature->title,
                'description' => $propertyFeature->description,
                'property' => $propertyFeature->property ? $propertyFeature->property->title : 'N/A',
                'created_at' => $propertyFeature->created_at->format('M d, Y H:i'),
                'updated_at' => $propertyFeature->updated_at->format('M d, Y H:i')
            ]
        ]);
    }
}
