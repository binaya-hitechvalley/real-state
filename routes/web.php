<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PropertyController;

Route::get('/', [HomeController::class, 'index']);

// Properties routes
// Route::get('/properties/demo', function () {
//     return view('frontend.properties.show');
// });
Route::get('/properties', [PropertyController::class, 'index'])->name('frontend.properties.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('frontend.properties.show');

// Location API routes for frontend
Route::get('/api/districts/{state}', [PropertyController::class, 'getDistricts'])->name('frontend.api.districts');
Route::get('/api/municipalities/{district}', [PropertyController::class, 'getMunicipalities'])->name('frontend.api.municipalities');

// Blog routes
Route::get('/blogs/{slug}', function ($slug) {
    $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
    
    // Related posts (same category, excluding current)
    $relatedPosts = \App\Models\Blog::active()
        ->published()
        ->where('id', '!=', $blog->id)
        ->when($blog->category, fn($q) => $q->where('category', $blog->category))
        ->ordered()
        ->take(3)
        ->get();
    
    // If not enough related posts from same category, fill with recent
    if ($relatedPosts->count() < 3) {
        $fill = \App\Models\Blog::active()
            ->published()
            ->where('id', '!=', $blog->id)
            ->whereNotIn('id', $relatedPosts->pluck('id'))
            ->ordered()
            ->take(3 - $relatedPosts->count())
            ->get();
        $relatedPosts = $relatedPosts->merge($fill);
    }
    
    // Recent posts for sidebar
    $recentPosts = \App\Models\Blog::active()
        ->published()
        ->where('id', '!=', $blog->id)
        ->orderByDesc('published_at')
        ->take(5)
        ->get();
    
    // Categories with counts
    $categories = \App\Models\Blog::active()
        ->published()
        ->whereNotNull('category')
        ->selectRaw('category, COUNT(*) as count')
        ->groupBy('category')
        ->orderByDesc('count')
        ->get();
    
    // Tags from meta_keywords
    $allTags = \App\Models\Blog::active()
        ->published()
        ->whereNotNull('meta_keywords')
        ->pluck('meta_keywords')
        ->flatMap(fn($kw) => array_map('trim', explode(',', $kw)))
        ->filter()
        ->unique()
        ->take(15);
    
    return view('frontend.blog-show', compact('blog', 'relatedPosts', 'recentPosts', 'categories', 'allTags'));
})->name('frontend.blogs.show');

// Routes based on Flowchart


Route::get('/bookings/create', function () {
    return view('frontend.bookings.create');
});

Route::get('/bookings/success', function () {
    return view('frontend.bookings.success');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

// Include admin routes
require __DIR__.'/admin.php';
