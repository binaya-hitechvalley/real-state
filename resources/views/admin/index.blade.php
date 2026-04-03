@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome to your admin panel')

@section('content')
    <!-- Page title -->
    <div class="mb-6">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Overview</h2>
        <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your platform today.</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Properties -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Properties</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProperties }}</p>
                    <p class="text-blue-500 text-sm mt-2">
                        <i class="fas fa-star mr-1"></i>
                        {{ $featuredProperties }} featured
                    </p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-home text-blue-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Blogs -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Blog Posts</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBlogs }}</p>
                    <a href="{{ route('admin.blogs.create') }}" class="text-green-500 text-sm mt-2 inline-block hover:underline">
                        <i class="fas fa-plus mr-1"></i> Write new post
                    </a>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-newspaper text-green-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Messages -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Contact Messages</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMessages }}</p>
                    @if($unreadMessages > 0)
                    <a href="{{ route('admin.contact-messages.index') }}" class="text-red-500 text-sm mt-2 inline-block hover:underline">
                        <i class="fas fa-envelope mr-1"></i>
                        {{ $unreadMessages }} unread
                    </a>
                    @else
                    <p class="text-green-500 text-sm mt-2">
                        <i class="fas fa-check mr-1"></i> All read
                    </p>
                    @endif
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-envelope text-purple-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Testimonials & FAQs -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Content Items</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalTestimonials + $totalFaqs }}</p>
                    <p class="text-gray-500 text-sm mt-2">
                        {{ $totalTestimonials }} testimonials, {{ $totalFaqs }} FAQs
                    </p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-quote-right text-yellow-500 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        
        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800">Recent Messages</h3>
                <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-500 text-sm font-medium hover:underline">View All →</a>
            </div>
            @if($recentMessages->count() > 0)
            <div class="space-y-4">
                @foreach($recentMessages as $msg)
                <a href="{{ route('admin.contact-messages.show', $msg) }}" class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors {{ $msg->is_read ? '' : 'bg-blue-50/50' }}">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 {{ $msg->is_read ? 'bg-gray-100' : 'bg-blue-100' }}">
                        <i class="fas fa-user text-sm {{ $msg->is_read ? 'text-gray-400' : 'text-blue-500' }}"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="font-medium text-gray-800 text-sm {{ $msg->is_read ? '' : 'font-bold' }}">{{ $msg->name }}</p>
                            <span class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-500 text-xs mt-0.5">{{ $msg->subject }}</p>
                        <p class="text-gray-400 text-xs mt-1 truncate">{{ Str::limit($msg->message, 60) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-inbox text-3xl mb-2"></i>
                <p class="text-sm">No messages yet</p>
            </div>
            @endif
        </div>

        <!-- Recent Properties -->
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800">Recent Properties</h3>
                <a href="{{ route('admin.properties.index') }}" class="text-blue-500 text-sm font-medium hover:underline">View All →</a>
            </div>
            @if($recentProperties->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($recentProperties as $property)
                <a href="{{ route('admin.properties.edit', $property) }}" class="flex flex-col border border-gray-100 rounded-xl overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-32 bg-gray-200 relative overflow-hidden">
                        @if($property->images && $property->images->count() > 0)
                            <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <i class="fas fa-image text-3xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-2 right-2 flex flex-col gap-1">
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-bold shadow-sm {{ $property->status === 'available' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                {{ ucfirst($property->status) }}
                            </span>
                            @if($property->is_featured)
                                <span class="bg-blue-500 text-white text-[10px] px-2 py-0.5 rounded-full font-bold shadow-sm">Featured</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-3 flex-1 flex flex-col justify-between bg-white">
                        <div>
                            <p class="font-bold text-gray-800 text-sm line-clamp-1 mb-1" title="{{ $property->title }}">{{ $property->title }}</p>
                            <p class="text-gray-500 text-[11px] flex items-center mb-2 line-clamp-1">
                                <i class="fas fa-map-marker-alt text-red-400 mr-1 shrink-0"></i>
                                {{ $property->municipality ? $property->municipality->name . ', ' : '' }}
                                {{ $property->district ? $property->district->name : ($property->address ?? 'No address') }}
                            </p>
                        </div>
                        <div class="font-black text-blue-600 text-sm">
                            Rs. {{ number_format((float)$property->price) }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-home text-3xl mb-2"></i>
                <p class="text-sm">No properties yet</p>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <a href="{{ route('admin.properties.create') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                <div class="text-blue-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">Add Property</p>
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                <div class="text-green-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-pen-fancy"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">Write Blog</p>
            </a>
            <a href="{{ route('admin.settings.about') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-indigo-300 hover:bg-indigo-50 transition-colors group">
                <div class="text-indigo-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">About Page</p>
            </a>
            <a href="{{ route('admin.settings.contact') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                <div class="text-purple-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-address-card"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">Contact Page</p>
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-amber-300 hover:bg-amber-50 transition-colors group relative">
                <div class="text-amber-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-envelope"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">Messages</p>
                @if($unreadMessages > 0)
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">{{ $unreadMessages }}</span>
                @endif
            </a>
            <a href="{{ route('admin.sliders.index') }}" class="text-center p-4 border border-gray-200 rounded-lg hover:border-cyan-300 hover:bg-cyan-50 transition-colors group">
                <div class="text-cyan-500 text-2xl mb-2 group-hover:scale-110 transition-transform">
                    <i class="fas fa-images"></i>
                </div>
                <p class="text-gray-700 text-sm font-medium">Sliders</p>
            </a>
        </div>
    </div>
@endsection