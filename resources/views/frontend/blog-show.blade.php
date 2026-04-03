@extends('frontend.layouts.master')

@section('title', ($blog->meta_title ?? $blog->title) . ' | Blog')

@push('styles')
<style>
    /* Blog Content Prose Styles */
    .blog-content { font-size: 1.125rem; line-height: 1.85; color: #334155; }
    .blog-content h1 { font-size: 2.25rem; font-weight: 800; color: #0f172a; margin: 2rem 0 1rem; line-height: 1.3; }
    .blog-content h2 { font-size: 1.75rem; font-weight: 700; color: #0f172a; margin: 2rem 0 0.75rem; line-height: 1.3; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem; }
    .blog-content h3 { font-size: 1.375rem; font-weight: 700; color: #1e293b; margin: 1.5rem 0 0.5rem; }
    .blog-content h4 { font-size: 1.125rem; font-weight: 600; color: #1e293b; margin: 1.25rem 0 0.5rem; }
    .blog-content p { margin-bottom: 1.25rem; }
    .blog-content ul, .blog-content ol { margin: 1rem 0 1.5rem 1.5rem; }
    .blog-content ul { list-style-type: disc; }
    .blog-content ol { list-style-type: decimal; }
    .blog-content li { margin-bottom: 0.5rem; padding-left: 0.25rem; }
    .blog-content blockquote { border-left: 4px solid #3b82f6; background: #f0f9ff; padding: 1.25rem 1.5rem; margin: 1.5rem 0; border-radius: 0 8px 8px 0; font-style: italic; color: #475569; }
    .blog-content a { color: #2563eb; text-decoration: underline; font-weight: 500; }
    .blog-content a:hover { color: #1d4ed8; }
    .blog-content img { border-radius: 12px; margin: 1.5rem 0; max-width: 100%; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
    .blog-content table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
    .blog-content th, .blog-content td { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; text-align: left; }
    .blog-content th { background: #f8fafc; font-weight: 600; color: #0f172a; }
    .blog-content strong { font-weight: 700; color: #0f172a; }
    .blog-content code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.9em; }
    .blog-content pre { background: #1e293b; color: #e2e8f0; padding: 1.5rem; border-radius: 12px; overflow-x: auto; margin: 1.5rem 0; }
    .blog-content pre code { background: transparent; padding: 0; color: inherit; }
    .blog-content figure { margin: 1.5rem 0; }
    .blog-content figcaption { text-align: center; font-size: 0.875rem; color: #94a3b8; margin-top: 0.5rem; }

    /* Share buttons */
    .share-btn { width: 40px; height: 40px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; transition: all 0.3s; font-size: 16px; }
    .share-btn:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,0.15); }

    /* Sidebar */
    .sidebar-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; }
    .sidebar-card h3 { font-size: 1.125rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 2px solid #3b82f6; display: inline-block; }

    /* Reading progress bar */
    .reading-progress { position: fixed; top: 0; left: 0; height: 3px; background: linear-gradient(90deg, #3b82f6, #8b5cf6); z-index: 100; transition: width 0.1s; }
</style>
@endpush

@section('content')

<!-- Reading Progress Bar -->
<div class="reading-progress" id="readingProgress" style="width: 0%"></div>

<!-- Hero Banner -->
<section class="pt-28 pb-12 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTQuNjI3IDI1LjVjMCAxNi4wMTYtMTIuOTg0IDI5LTI5IDI5cy0yOS0xMi45ODQtMjktMjkgMTIuOTg0LTI5IDI5LTI5IDI5IDEyLjk4NCAyOSAyOVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIuMDMiLz48L3N2Zz4=')] opacity-60"></div>
    <div class="container mx-auto px-4 md:px-8 max-w-6xl relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm mb-8">
            <a href="/" class="text-slate-400 hover:text-white transition-colors"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-slate-600 text-xs"></i>
            <a href="/" class="text-slate-400 hover:text-white transition-colors">Blog</a>
            @if($blog->category)
                <i class="fas fa-chevron-right text-slate-600 text-xs"></i>
                <span class="text-slate-400">{{ $blog->category }}</span>
            @endif
        </nav>

        <div class="max-w-4xl">
            <!-- Category & Date -->
            <div class="flex flex-wrap items-center gap-3 mb-6">
                @if($blog->category)
                    <span class="px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-wider border border-blue-500/30">
                        {{ $blog->category }}
                    </span>
                @endif
                @if($blog->published_at)
                    <span class="text-slate-400 text-sm font-medium flex items-center gap-2">
                        <i class="far fa-calendar-alt"></i> {{ $blog->published_at->format('F d, Y') }}
                    </span>
                @endif
                <span class="text-slate-500 text-sm flex items-center gap-2">
                    <i class="far fa-clock"></i>
                    {{ ceil(str_word_count(strip_tags($blog->content ?? '')) / 200) }} min read
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight mb-6">
                {{ $blog->title }}
            </h1>

            @if($blog->excerpt)
                <p class="text-lg text-slate-300 leading-relaxed max-w-3xl">{{ $blog->excerpt }}</p>
            @endif
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8 max-w-6xl">
        <div class="flex flex-col lg:flex-row gap-10">

            <!-- Article Content -->
            <article class="lg:w-2/3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Featured Image -->
                    @if($blog->display_image)
                    <div class="w-full">
                        <img src="{{ $blog->display_image }}" alt="{{ $blog->title }}" class="w-full h-auto max-h-[480px] object-cover">
                    </div>
                    @endif

                    <!-- Content -->
                    <div class="p-6 md:p-10">
                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>
                    </div>

                    <!-- Tags -->
                    @if($blog->meta_keywords)
                    <div class="px-6 md:px-10 pb-6">
                        <div class="flex flex-wrap items-center gap-2 pt-6 border-t border-gray-100">
                            <span class="text-sm font-semibold text-slate-500 mr-2"><i class="fas fa-tags mr-1"></i>Tags:</span>
                            @foreach(array_map('trim', explode(',', $blog->meta_keywords)) as $tag)
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-pointer">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share & Actions -->
                    <div class="px-6 md:px-10 pb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-6 border-t border-gray-100">
                            <div>
                                <span class="text-sm font-semibold text-slate-500 block mb-3">Share this article</span>
                                <div class="flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn bg-blue-600 text-white hover:bg-blue-700">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="share-btn bg-sky-500 text-white hover:bg-sky-600">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="share-btn bg-blue-700 text-white hover:bg-blue-800">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . request()->url()) }}" target="_blank" class="share-btn bg-green-500 text-white hover:bg-green-600">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <button onclick="navigator.clipboard.writeText('{{ request()->url() }}').then(() => alert('Link copied!'))" class="share-btn bg-slate-200 text-slate-600 hover:bg-slate-300">
                                        <i class="fas fa-link"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="/" class="text-sm text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-2">
                                <i class="fas fa-arrow-left"></i> Back to Home
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Post Navigation -->
                @php
                    $prevPost = \App\Models\Blog::active()->published()->where('published_at', '<', $blog->published_at)->orderByDesc('published_at')->first();
                    $nextPost = \App\Models\Blog::active()->published()->where('published_at', '>', $blog->published_at)->orderBy('published_at')->first();
                @endphp
                @if($prevPost || $nextPost)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                    @if($prevPost)
                    <a href="{{ route('frontend.blogs.show', $prevPost->slug) }}" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all">
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider flex items-center gap-2 mb-2">
                            <i class="fas fa-arrow-left text-blue-500"></i> Previous Post
                        </span>
                        <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $prevPost->title }}</h4>
                    </a>
                    @else
                    <div></div>
                    @endif
                    @if($nextPost)
                    <a href="{{ route('frontend.blogs.show', $nextPost->slug) }}" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all text-right">
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider flex items-center justify-end gap-2 mb-2">
                            Next Post <i class="fas fa-arrow-right text-blue-500"></i>
                        </span>
                        <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $nextPost->title }}</h4>
                    </a>
                    @endif
                </div>
                @endif
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 space-y-6">

                <!-- Search -->
                <div class="sidebar-card">
                    <h3>Search</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search articles..." class="w-full px-4 py-3 pr-12 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" id="blogSearch" onkeypress="if(event.key==='Enter') alert('Search coming soon!')">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Categories -->
                @if($categories->isNotEmpty())
                <div class="sidebar-card">
                    <h3>Categories</h3>
                    <ul class="space-y-1">
                        @foreach($categories as $cat)
                        <li>
                            <a href="/" class="flex items-center justify-between py-2.5 px-3 rounded-lg hover:bg-blue-50 text-slate-600 hover:text-blue-600 transition-all group">
                                <span class="flex items-center gap-3">
                                    <i class="fas fa-folder text-slate-300 group-hover:text-blue-400 text-sm transition-colors"></i>
                                    <span class="font-medium text-sm">{{ $cat->category }}</span>
                                </span>
                                <span class="bg-slate-100 group-hover:bg-blue-100 text-slate-500 group-hover:text-blue-600 text-xs font-bold px-2.5 py-0.5 rounded-full transition-colors">{{ $cat->count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Recent Posts -->
                @if($recentPosts->isNotEmpty())
                <div class="sidebar-card">
                    <h3>Recent Posts</h3>
                    <div class="space-y-4">
                        @foreach($recentPosts as $recent)
                        <a href="{{ route('frontend.blogs.show', $recent->slug) }}" class="flex gap-3 group">
                            <div class="w-20 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-slate-100">
                                @if($recent->display_image)
                                    <img src="{{ $recent->display_image }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <i class="fas fa-image text-lg"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-slate-700 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">{{ $recent->title }}</h4>
                                <span class="text-xs text-slate-400 mt-1 block">
                                    {{ $recent->published_at ? $recent->published_at->format('M d, Y') : '' }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Tags Cloud -->
                @if($allTags->isNotEmpty())
                <div class="sidebar-card">
                    <h3>Popular Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($allTags as $tag)
                            <span class="px-3 py-1.5 bg-gray-50 border border-gray-200 text-slate-600 text-xs font-medium rounded-full hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 transition-all cursor-pointer">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Newsletter CTA -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Stay Updated</h3>
                        <p class="text-blue-100 text-sm mb-4 leading-relaxed">Get the latest real estate insights delivered to your inbox.</p>
                        <input type="email" placeholder="Your email address" class="w-full px-4 py-2.5 bg-white/20 border border-white/30 rounded-lg text-white placeholder-blue-200 text-sm focus:outline-none focus:ring-2 focus:ring-white/40 mb-3">
                        <button class="w-full bg-white text-blue-600 font-bold text-sm py-2.5 rounded-lg hover:bg-blue-50 transition-colors">
                            Subscribe
                        </button>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->isNotEmpty())
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-6xl">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fas fa-newspaper"></i> Keep Reading
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Related Articles</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
            <a href="{{ route('frontend.blogs.show', $related->slug) }}" class="group">
                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col">
                    <!-- Image -->
                    <div class="relative h-48 overflow-hidden bg-gradient-to-br from-slate-100 to-slate-200">
                        @if($related->display_image)
                            <img src="{{ $related->display_image }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <i class="fas fa-image text-4xl"></i>
                            </div>
                        @endif
                        @if($related->category)
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-600 text-xs font-bold rounded-full">
                            {{ $related->category }}
                        </span>
                        @endif
                    </div>
                    <!-- Content -->
                    <div class="p-5 flex flex-col flex-grow">
                        @if($related->published_at)
                        <span class="text-xs text-slate-400 font-medium mb-2 flex items-center gap-1">
                            <i class="far fa-calendar-alt"></i> {{ $related->published_at->format('M d, Y') }}
                        </span>
                        @endif
                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition-colors leading-snug mb-3 line-clamp-2">{{ $related->title }}</h3>
                        @if($related->excerpt)
                        <p class="text-sm text-slate-500 leading-relaxed line-clamp-2 flex-grow">{{ $related->excerpt }}</p>
                        @endif
                        <div class="mt-4 pt-4 border-t border-gray-50">
                            <span class="text-sm font-semibold text-blue-600 flex items-center gap-2 group-hover:gap-3 transition-all">
                                Read More <i class="fas fa-arrow-right text-xs"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
// Reading progress bar
window.addEventListener('scroll', function() {
    const article = document.querySelector('article');
    if (!article) return;
    const rect = article.getBoundingClientRect();
    const scrolled = Math.max(0, -rect.top);
    const total = rect.height - window.innerHeight;
    const progress = Math.min(100, Math.max(0, (scrolled / total) * 100));
    document.getElementById('readingProgress').style.width = progress + '%';
});
</script>
@endpush
