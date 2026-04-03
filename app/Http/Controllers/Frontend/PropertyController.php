<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\BusinessType;
use App\Models\Municipality;
use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of properties with filtering, sorting, and search.
     */
    public function index(Request $request)
    {
        $query = Property::with(['primaryImage', 'images', 'businessType', 'propertyType', 'municipality', 'state', 'district'])
            ->available();

        // Search by title, description, or address
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Filter by business type (sale/rent)
        if ($businessType = $request->get('business_type')) {
            $query->where('business_type_id', $businessType);
        }

        // Filter by property type (multiple, checkboxes)
        if ($propertyTypes = $request->get('property_types')) {
            if (is_array($propertyTypes)) {
                $query->whereIn('property_type_id', $propertyTypes);
            }
        }

        // Location Filters (State, District, Municipality)
        if ($state = $request->get('state')) {
            $query->where('state_id', $state);
        }
        if ($district = $request->get('district')) {
            $query->where('district_id', $district);
        }
        if ($municipality = $request->get('municipality')) {
            $query->where('municipality_id', $municipality);
        }

        // Filter by price range
        if ($minPrice = $request->get('min_price')) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice = $request->get('max_price')) {
            $query->where('price', '<=', $maxPrice);
        }

        // Filter featured only
        if ($request->get('featured')) {
            $query->where('is_featured', true);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'featured':
                $query->orderByDesc('is_featured')->orderByDesc('created_at');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'newest':
            default:
                $query->orderByDesc('created_at');
                break;
        }

        $properties = $query->paginate(12)->withQueryString();

        // Total count for display
        $totalProperties = Property::available()->count();

        // Filter data for sidebar
        $propertyTypes = PropertyType::withCount(['properties' => function ($q) {
            $q->where('status', 'available');
        }])->orderBy('name')->get();

        $businessTypes = BusinessType::withCount(['properties' => function ($q) {
            $q->where('status', 'available');
        }])->orderBy('name')->get();

        // Location Dropdown Data
        $states = State::orderBy('name')->get();
        
        $districts = collect();
        if ($request->get('state')) {
            $districts = District::where('state_id', $request->get('state'))->orderBy('name')->get();
        }

        $municipalities = collect();
        if ($request->get('district')) {
            $municipalities = Municipality::where('district_id', $request->get('district'))->orderBy('name')->get();
        }

        // Price range for slider
        $maxPropertyPrice = Property::available()->max('price') ?: 50000000;
        $minPropertyPrice = Property::available()->min('price') ?: 0;

        return view('frontend.properties.index', compact(
            'properties',
            'totalProperties',
            'propertyTypes',
            'businessTypes',
            'states',
            'districts',
            'municipalities',
            'maxPropertyPrice',
            'minPropertyPrice'
        ));
    }

    /**
     * API to get districts for a state
     */
    public function getDistricts(State $state)
    {
        return response()->json($state->districts()->orderBy('name')->get(['id', 'name']));
    }

    /**
     * API to get municipalities for a district
     */
    public function getMunicipalities(District $district)
    {
        return response()->json($district->municipalities()->orderBy('name')->get(['id', 'name']));
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
