<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Testimonial;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();
        $featuredProperties = Property::where('is_featured', true)->count();
        $totalBlogs = Blog::count();
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $totalTestimonials = Testimonial::count();
        $totalFaqs = Faq::count();
        $recentMessages = ContactMessage::orderByDesc('created_at')->take(5)->get();
        $recentProperties = Property::with(['images', 'district', 'municipality'])->orderByDesc('created_at')->take(5)->get();

        return view('admin.index', compact(
            'totalProperties', 'featuredProperties', 'totalBlogs',
            'totalMessages', 'unreadMessages', 'totalTestimonials',
            'totalFaqs', 'recentMessages', 'recentProperties'
        ));
    }
}
