@extends('admin.layouts.master')

@section('title', 'General Settings')
@section('page-title', 'General Settings')
@section('page-subtitle', 'Manage your website\'s core settings')

@section('content')
<div class="max-w-5xl">
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-globe text-blue-500"></i> Basic Information
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Sapphire Investment' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Home Page Title (SEO)</label>
                    <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Sapphire Investment | Premium Real Estate Nepal' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- SEO Information -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-search text-green-500"></i> Global SEO Settings
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea name="site_description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['site_description'] ?? 'Discover premium real estate properties in Nepal with Sapphire Investment. We offer verified residential and commercial listings.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords (Comma separated)</label>
                    <input type="text" name="site_keywords" value="{{ $settings['site_keywords'] ?? 'real estate nepal, properties in kathmandu, buy land nepal, sapphire investment' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Branding Images -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-image text-purple-500"></i> Branding
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Site Logo -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Logo (Recommended: max height 100px)</label>
                    
                    @if(isset($settings['site_logo']) && $settings['site_logo'])
                        <div class="mb-4 bg-gray-100 p-2 rounded inline-block">
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Site Logo" class="h-12 object-contain">
                        </div>
                    @endif
                    
                    <input type="file" name="site_logo" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white">
                </div>

                <!-- Site Favicon -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Favicon (Recommended: 32x32px .ico or .png)</label>
                    
                    @if(isset($settings['site_favicon']) && $settings['site_favicon'])
                        <div class="mb-4 bg-gray-100 p-2 rounded inline-block">
                            <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Favicon" class="h-8 w-8 object-contain">
                        </div>
                    @endif
                    
                    <input type="file" name="site_favicon" accept="image/png, image/jpeg, image/x-icon, image/ico, image/svg+xml"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white">
                </div>
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition-colors">
            <i class="fas fa-save mr-2"></i> Save General Settings
        </button>
    </form>
</div>
@endsection
