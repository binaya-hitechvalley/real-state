@extends('admin.layouts.master')

@section('title', 'Create Slider')

@section('content')
<div class="container mx-auto max-w-4xl">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create New Slider</h1>
            <p class="text-gray-600 mt-1">Add a new slider to your website</p>
        </div>
        <a href="{{ route('admin.sliders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Title <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    placeholder="Enter slider title"
                    required>
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div class="mb-6">
                <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                    Subtitle
                </label>
                <input type="text" 
                    name="subtitle" 
                    id="subtitle" 
                    value="{{ old('subtitle') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subtitle') border-red-500 @enderror"
                    placeholder="Enter slider subtitle (optional)">
                @error('subtitle')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Link -->
            <div class="mb-6">
                <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                    Link URL
                </label>
                <input type="url" 
                    name="link" 
                    id="link" 
                    value="{{ old('link') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('link') border-red-500 @enderror"
                    placeholder="https://example.com">
                @error('link')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Slider Image <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition @error('image') border-red-500 @enderror">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                <span>Upload a file</span>
                                <input id="image" 
                                    name="image" 
                                    type="file" 
                                    class="sr-only"
                                    accept="image/*"
                                    onchange="previewImage(event)"
                                    required>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP up to 2MB</p>
                        <div id="imagePreview" class="mt-4"></div>
                    </div>
                </div>
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alt Text -->
            <div class="mb-6">
                <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-2">
                    Image Alt Text
                </label>
                <input type="text" 
                    name="alt_text" 
                    id="alt_text" 
                    value="{{ old('alt_text') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('alt_text') border-red-500 @enderror"
                    placeholder="Descriptive text for the image">
                @error('alt_text')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div class="mb-6">
                <label for="order_column" class="block text-sm font-medium text-gray-700 mb-2">
                    Display Order
                </label>
                <input type="number" 
                    name="order_column" 
                    id="order_column" 
                    value="{{ old('order_column', 0) }}"
                    min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('order_column') border-red-500 @enderror"
                    placeholder="0">
                @error('order_column')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" 
                        name="is_active" 
                        value="1" 
                        {{ old('is_active', true) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
                </label>
                <p class="text-xs text-gray-500 ml-6">Uncheck to hide this slider from the website</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.sliders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>
                    Create Slider
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Preview">`;
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
@endsection
