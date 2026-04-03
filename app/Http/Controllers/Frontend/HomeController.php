<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Property;
use App\Models\BusinessType;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SiteStat;

class HomeController extends Controller
{
    /**
     * Display the home page with active sliders and featured properties.
     */
    public function index()
    {
        // Get active sliders
        $sliders = Slider::with('image')
            ->active()
            ->ordered()
            ->get();
        
        // Get featured properties with their primary images and relationships
        $featuredProperties = Property::with(['primaryImage', 'businessType', 'municipality'])
            ->available()
            ->featured()
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(12) // Limit to 12 properties for the slider
            ->get();
        
        // Get all available properties for the "All" tab
        $allProperties = Property::with(['primaryImage', 'businessType', 'municipality'])
            ->available()
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        
        // Get business types for filtering
        $businessTypes = BusinessType::orderBy('name')->get();

        // Get active blogs for the Market Insights section
        $blogs = Blog::with('image')
            ->active()
            ->published()
            ->ordered()
            ->take(8)
            ->get();

        // Get active testimonials
        $testimonials = Testimonial::active()
            ->ordered()
            ->get();

        // Get active FAQs
        $faqs = Faq::active()
            ->ordered()
            ->get();

        // Get active site stats
        $siteStats = SiteStat::active()
            ->ordered()
            ->get();
            
        return view('frontend.home', compact(
            'sliders',
            'featuredProperties',
            'allProperties',
            'businessTypes',
            'blogs',
            'testimonials',
            'faqs',
            'siteStats'
        ));
    }
}
