<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs with optional search/category/tag filtering.
     */
    public function index(Request $request)
    {
        $query = Blog::active()->published();

        // Handle Search
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta_keywords', 'like', "%{$search}%");
            });
        }

        // Handle Category Filtering
        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        // Handle Tag Filtering
        if ($tag = $request->input('tag')) {
            $query->where('meta_keywords', 'like', "%{$tag}%");
        }

        // Paginate the results (12 per page usually looks good in a grid)
        $blogs = $query->ordered()->paginate(12)->withQueryString();

        // Get sidebar data: Categories with counts
        $categories = Blog::active()
            ->published()
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->get();
            
        // Get sidebar data: Popular/Recent Tags
        $allTags = Blog::active()
            ->published()
            ->whereNotNull('meta_keywords')
            ->pluck('meta_keywords')
            ->flatMap(fn($kw) => array_map('trim', explode(',', $kw)))
            ->filter()
            ->unique()
            ->take(15);
            
        // Get sidebar data: Recent Posts
        $recentPosts = Blog::active()
            ->published()
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        return view('frontend.blogs.index', compact('blogs', 'categories', 'allTags', 'recentPosts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $blog = Blog::active()->published()->where('slug', $slug)->firstOrFail();
        
        // Ensure accurate viewing behavior even if draft is requested directly (handled by scope/fail)
        
        // Related posts (same category, excluding current)
        $relatedPosts = Blog::active()
            ->published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category, fn($q) => $q->where('category', $blog->category))
            ->ordered()
            ->take(3)
            ->get();
        
        // If not enough related posts from same category, fill with recent
        if ($relatedPosts->count() < 3) {
            $fill = Blog::active()
                ->published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->ordered()
                ->take(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($fill);
        }
        
        // Recent posts for sidebar
        $recentPosts = Blog::active()
            ->published()
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(5)
            ->get();
        
        // Categories with counts
        $categories = Blog::active()
            ->published()
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->get();
        
        // Tags from meta_keywords
        $allTags = Blog::active()
            ->published()
            ->whereNotNull('meta_keywords')
            ->pluck('meta_keywords')
            ->flatMap(fn($kw) => array_map('trim', explode(',', $kw)))
            ->filter()
            ->unique()
            ->take(15);
        
        return view('frontend.blog-show', compact('blog', 'relatedPosts', 'recentPosts', 'categories', 'allTags'));
    }
}
