@extends('frontend.layouts.master')

@section('title', 'Blogs & Insights')

@section('content')

<!-- Hero Section -->
<section class="pt-32 pb-16 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTQuNjI3IDI1LjVjMCAxNi4wMTYtMTIuOTg0IDI5LTI5IDI5cy0yOS0xMi45ODQtMjktMjkgMTIuOTg0LTI5IDI5LTI5IDI5IDEyLjk4NCAyOSAyOVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIuMDMiLz48L3N2Zz4=')] opacity-60"></div>
    <div class="container mx-auto px-4 md:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight mb-6">
            Latest Insights
        </h1>
        <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto mb-10">
            Discover real estate tips, market analysis, legal advice, and investment strategies.
        </p>
        
        <!-- Search Bar -->
        <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-md p-2 rounded-2xl border border-white/20">
            <form action="{{ route('frontend.blogs.index') }}" method="GET" class="flex items-center bg-white rounded-xl overflow-hidden p-1 shadow-lg">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles, topics, or keywords..." class="w-full px-6 py-3 border-none focus:ring-0 text-slate-700 bg-transparent">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold transition-colors">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-10">
            
            <!-- Blogs Grid -->
            <div class="lg:w-3/4">
                
                <!-- Active Filters Info -->
                @if(request()->hasAny(['search', 'category', 'tag']))
                <div class="mb-8 flex flex-wrap items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <span class="text-sm font-semibold text-slate-500">Showing results for:</span>
                    
                    @if(request('search'))
                    <span class="px-4 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium flex items-center gap-2 border border-blue-100">
                        <i class="fas fa-search text-blue-400"></i> "{{ request('search') }}"
                        <a href="{{ route('frontend.blogs.index', request()->except('search')) }}" class="ml-2 hover:text-red-500"><i class="fas fa-times"></i></a>
                    </span>
                    @endif
                    
                    @if(request('category'))
                    <span class="px-4 py-1.5 bg-purple-50 text-purple-700 rounded-lg text-sm font-medium flex items-center gap-2 border border-purple-100">
                        <i class="fas fa-folder text-purple-400"></i> {{ request('category') }}
                        <a href="{{ route('frontend.blogs.index', request()->except('category')) }}" class="ml-2 hover:text-red-500"><i class="fas fa-times"></i></a>
                    </span>
                    @endif
                    
                    @if(request('tag'))
                    <span class="px-4 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-medium flex items-center gap-2 border border-emerald-100">
                        <i class="fas fa-tag text-emerald-400"></i> {{ request('tag') }}
                        <a href="{{ route('frontend.blogs.index', request()->except('tag')) }}" class="ml-2 hover:text-red-500"><i class="fas fa-times"></i></a>
                    </span>
                    @endif
                    
                    <a href="{{ route('frontend.blogs.index') }}" class="text-sm text-slate-500 hover:text-red-500 underline ml-auto">Clear All Filters</a>
                </div>
                @endif
                
                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @forelse($blogs as $blog)
                    <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                        <div class="relative h-56 overflow-hidden">
                            @if($blog->display_image)
                            <img src="{{ $blog->display_image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                <i class="fas fa-image text-slate-300 text-4xl"></i>
                            </div>
                            @endif
                            
                            @if($blog->category)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur text-blue-600 text-xs font-bold uppercase tracking-wider rounded-lg shadow-sm">
                                    {{ $blog->category }}
                                </span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-3 text-xs text-slate-500 font-medium mb-3">
                                <span><i class="far fa-calendar-alt text-blue-500 mr-1"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('frontend.blogs.show', $blog->slug) }}" class="before:absolute before:inset-0">{{ $blog->title }}</a>
                            </h3>
                            
                            <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-grow">
                                {{ $blog->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}
                            </p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-sm font-bold text-blue-600 flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="col-span-full pt-10 pb-16 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                        <i class="fas fa-newspaper text-6xl text-slate-200 mb-4 block"></i>
                        <h3 class="text-2xl font-bold text-slate-700 mb-2">No Articles Found</h3>
                        <p class="text-slate-500 mb-6">We couldn't find any blogs matching your criteria.</p>
                        <a href="{{ route('frontend.blogs.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">View All Articles</a>
                    </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                @if($blogs->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $blogs->links() }}
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="sticky top-24 space-y-8">
                    
                    <!-- Categories -->
                    @if($categories->count() > 0)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 pb-3 border-b-2 border-blue-500 inline-block">Categories</h3>
                        <ul class="space-y-3">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('frontend.blogs.index', ['category' => $cat->category]) }}" class="flex items-center justify-between group">
                                    <span class="text-slate-600 group-hover:text-blue-600 font-medium transition-colors {{ request('category') == $cat->category ? 'text-blue-600' : '' }}">
                                        {{ $cat->category }}
                                    </span>
                                    <span class="bg-slate-100 text-slate-500 text-xs px-2 py-1 rounded-md group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors {{ request('category') == $cat->category ? 'bg-blue-100 text-blue-600' : '' }}">
                                        {{ $cat->count }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <!-- Popular Tags -->
                    @if($allTags->count() > 0)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 pb-3 border-b-2 border-emerald-500 inline-block">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($allTags as $tag)
                            <a href="{{ route('frontend.blogs.index', ['tag' => $tag]) }}" class="px-3 py-1.5 bg-slate-100 hover:bg-emerald-50 text-slate-600 hover:text-emerald-700 text-xs font-semibold rounded-lg transition-colors border border-transparent hover:border-emerald-200 {{ request('tag') == $tag ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}">
                                {{ $tag }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Recent Posts -->
                    @if($recentPosts->count() > 0)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 pb-3 border-b-2 border-purple-500 inline-block">Recent Articles</h3>
                        <div class="space-y-4">
                            @foreach($recentPosts as $post)
                            <a href="{{ route('frontend.blogs.show', $post->slug) }}" class="group flex gap-3 items-center">
                                @if($post->display_image)
                                <img src="{{ $post->display_image }}" alt="" class="w-16 h-16 rounded-lg object-cover">
                                @else
                                <div class="w-16 h-16 rounded-lg bg-slate-100 flex items-center justify-center">
                                    <i class="fas fa-file-alt text-slate-300"></i>
                                </div>
                                @endif
                                <div>
                                    <h4 class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors line-clamp-2 leading-tight">
                                        {{ $post->title }}
                                    </h4>
                                    <span class="text-xs text-slate-400 mt-1 block">{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection
