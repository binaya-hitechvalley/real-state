<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\BusinessType;

class PropertyController extends Controller
{
    /**
     * Display a listing of properties.
     */
    public function index()
    {
        $properties = Property::with(['primaryImage', 'businessType', 'municipality'])
            ->available()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $propertyTypes = PropertyType::orderBy('name')->get();
        $businessTypes = BusinessType::orderBy('name')->get();

        return view('frontend.properties.index', compact('properties', 'propertyTypes', 'businessTypes'));
    }

    /**
     * Display the specified property.
     */
    public function show($slug)
    {
        $property = Property::with([
            'primaryImage', 
            'images', 
            'propertyType', 
            'businessType', 
            'municipality.district.state',
            'features'
        ])
        ->where('slug', $slug)
        ->where('status', 'available')
        ->firstOrFail();

        // Get related properties (same business type, same municipality)
        $relatedProperties = Property::with(['primaryImage', 'businessType', 'municipality'])
            ->where('id', '!=', $property->id)
            ->where('status', 'available')
            ->where(function($query) use ($property) {
                $query->where('business_type_id', $property->business_type_id)
                      ->orWhere('municipality_id', $property->municipality_id);
            })
            ->take(6)
            ->get();

        return view('frontend.properties.show', compact('property', 'relatedProperties'));
    }
}
