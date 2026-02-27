<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Services\Admin\PropertyService;
use App\Models\PropertyType;
use App\Models\BusinessType;
use App\Models\State;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected PropertyService $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * Display a listing of properties.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\PropertiesDataTable();
            return $dataTable->dataTable();
        }
        
        $propertyTypes = PropertyType::orderBy('name')->get();
        $businessTypes = BusinessType::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        
        return view('admin.properties.index', compact('propertyTypes', 'businessTypes', 'states'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        $propertyTypes = PropertyType::orderBy('name')->get();
        $businessTypes = BusinessType::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        
        return view('admin.properties.create', compact('propertyTypes', 'businessTypes', 'states'));
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(PropertyRequest $request)
    {
        $this->propertyService->create($request->validated());
        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    /**
     * Show the form for editing the specified property.
     */
    public function edit(int $id)
    {
        $property = $this->propertyService->find($id);
        $propertyTypes = PropertyType::orderBy('name')->get();
        $businessTypes = BusinessType::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $municipalities = $property->state->municipalities()->orderBy('name')->get();
        
        return view('admin.properties.edit', compact('property', 'propertyTypes', 'businessTypes', 'states', 'municipalities'));
    }

    /**
     * Update the specified property in storage.
     */
    public function update(PropertyRequest $request, int $id)
    {
        $property = $this->propertyService->find($id);
        $this->propertyService->update($property, $request->validated());
        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified property from storage.
     */
    public function destroy(int $id)
    {
        $property = $this->propertyService->find($id);
        $this->propertyService->delete($property);
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(int $id)
    {
        $property = $this->propertyService->find($id);
        $this->propertyService->toggleFeatured($property);
        
        return response()->json([
            'success' => true,
            'is_featured' => $property->fresh()->is_featured
        ]);
    }

    /**
     * Delete property image.
     */
    public function deleteImage(int $id, int $imageId)
    {
        $property = $this->propertyService->find($id);
        $this->propertyService->deleteImage($property, $imageId);
        
        return response()->json(['success' => true]);
    }

    /**
     * Set primary image.
     */
    public function setPrimaryImage(int $id, int $imageId)
    {
        $property = $this->propertyService->find($id);
        $this->propertyService->setPrimaryImage($property, $imageId);
        
        return response()->json(['success' => true]);
    }

    /**
     * Get municipalities by state.
     */
    public function getMunicipalities(int $stateId)
    {
        $state = State::findOrFail($stateId);
        $municipalities = $state->municipalities()->orderBy('name')->get();
        
        return response()->json($municipalities);
    }
}
