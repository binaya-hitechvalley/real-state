<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Display the home page with active sliders.
     */
    public function index()
    {
        $sliders = Slider::with('image')
            ->active()
            ->ordered()
            ->get();
            
        return view('frontend.home', compact('sliders'));
    }
}
