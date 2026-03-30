@extends('admin.layouts.master')

@section('title', 'Edit Property')

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit Property</h1>
            <p class="text-gray-600 mt-1">Update property details</p>
        </div>
        <a href="{{ route('admin.properties.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $property->title) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="md:col-span-2">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $property->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                        placeholder="Auto-generated from title">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Property Type -->
                <div>
                    <label for="property_type_id" class="block text-sm font-medium text-gray-700 mb-2">Property Type <span class="text-red-500">*</span></label>
                    <select id="property_type_id" name="property_type_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('property_type_id') border-red-500 @enderror">
                        <option value="">Select Property Type</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}" {{ old('property_type_id', $property->property_type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_type_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Business Type -->
                <div>
                    <label for="business_type_id" class="block text-sm font-medium text-gray-700 mb-2">Business Type <span class="text-red-500">*</span></label>
                    <select id="business_type_id" name="business_type_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('business_type_id') border-red-500 @enderror">
                        <option value="">Select Business Type</option>
                        @foreach($businessTypes as $type)
                            <option value="{{ $type->id }}" {{ old('business_type_id', $property->business_type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('business_type_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label for="state_id" class="block text-sm font-medium text-gray-700 mb-2">State <span class="text-red-500">*</span></label>
                    <select id="state_id" name="state_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('state_id') border-red-500 @enderror">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id', $property->state_id) == $state->id ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('state_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- District -->
                <div>
                    <label for="district_id" class="block text-sm font-medium text-gray-700 mb-2">District</label>
                    <select id="district_id" name="district_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('district_id') border-red-500 @enderror">
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ old('district_id', $property->district_id) == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('district_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Municipality -->
                <div>
                    <label for="municipality_id" class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                    <select id="municipality_id" name="municipality_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('municipality_id') border-red-500 @enderror">
                        <option value="">Select Municipality</option>
                        @foreach($municipalities as $municipality)
                            <option value="{{ $municipality->id }}" {{ old('municipality_id', $property->municipality_id) == $municipality->id ? 'selected' : '' }}>
                                {{ $municipality->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('municipality_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $property->price) }}" step="0.01" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror">
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price Period -->
                <div>
                    <label for="price_period" class="block text-sm font-medium text-gray-700 mb-2">Price Period <span class="text-red-500">*</span></label>
                    <select id="price_period" name="price_period" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price_period') border-red-500 @enderror">
                        <option value="total" {{ old('price_period', $property->price_period) == 'total' ? 'selected' : '' }}>Total</option>
                        <option value="monthly" {{ old('price_period', $property->price_period) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="yearly" {{ old('price_period', $property->price_period) == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                    @error('price_period')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Land Area Size -->
                <div>
                    <label for="land_area_size" class="block text-sm font-medium text-gray-700 mb-2">Land Area Size</label>
                    <div class="flex gap-2">
                        <input type="number" id="land_area_size" name="land_area_size" value="{{ old('land_area_size', $property->land_area_size) }}" step="0.01" min="0"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('land_area_size') border-red-500 @enderror"
                            placeholder="Enter area value">
                        <select id="land_area_unit" name="land_area_unit"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('land_area_unit') border-red-500 @enderror">
                            <option value="sqft" {{ old('land_area_unit', $property->land_area_unit ?? 'sqft') == 'sqft' ? 'selected' : '' }}>Sq Ft</option>
                            <option value="sqm" {{ old('land_area_unit') == 'sqm' ? 'selected' : '' }}>Sq M</option>
                            <option value="aana" {{ old('land_area_unit') == 'aana' ? 'selected' : '' }}>Aana</option>
                            <option value="ropani" {{ old('land_area_unit') == 'ropani' ? 'selected' : '' }}>Ropani</option>
                            <option value="dhur" {{ old('land_area_unit') == 'dhur' ? 'selected' : '' }}>Dhur</option>
                            <option value="kattha" {{ old('land_area_unit') == 'kattha' ? 'selected' : '' }}>Kattha</option>
                            <option value="bigha" {{ old('land_area_unit') == 'bigha' ? 'selected' : '' }}>Bigha</option>
                        </select>
                    </div>
                    <div class="mt-2 text-sm text-gray-600">
                        <span id="area-conversion">Enter area value to see conversions</span>
                    </div>
                    @error('land_area_size')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                        <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="rented" {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}>Rented</option>
                        <option value="inactive" {{ old('status', $property->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $property->address) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror">
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Latitude -->
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                    <input type="number" id="latitude" name="latitude" value="{{ old('latitude', $property->latitude) }}" step="0.00000001" min="-90" max="90"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('latitude') border-red-500 @enderror">
                    @error('latitude')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Longitude -->
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                    <input type="number" id="longitude" name="longitude" value="{{ old('longitude', $property->longitude) }}" step="0.00000001" min="-180" max="180"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('longitude') border-red-500 @enderror">
                    @error('longitude')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="10"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $property->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Existing Images -->
                @if($property->images->count() > 0)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Existing Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($property->images as $image)
                        <div class="relative group" id="image-{{ $image->id }}">
                            <img src="{{ $image->url }}" alt="{{ $image->alt_text }}" class="w-full h-32 object-cover rounded-lg">
                            @if($image->is_primary)
                                <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">Primary</span>
                            @else
                                <button type="button" onclick="setPrimaryImage({{ $image->id }})"
                                    class="absolute top-2 left-2 bg-gray-600 hover:bg-blue-600 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
                                    Set Primary
                                </button>
                            @endif
                            <button type="button" onclick="deleteImage({{ $image->id }})"
                                class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>

                    <!-- Image Preview Area -->
                    <div id="image-preview-area" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 hidden">
                        <!-- Image previews will be added here dynamically -->
                    </div>

                    <!-- Upload Progress -->
                    <div id="upload-progress" class="mt-4 hidden">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="progress-bar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <p id="progress-text" class="text-sm text-gray-600 mt-1 text-center">Uploading...</p>
                    </div>

                    <!-- Error Message Area -->
                    <div id="upload-error" class="mt-4 hidden">
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                            <p id="error-message"></p>
                        </div>
                    </div>

                    @error('images.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Add New Images -->
                <div class="md:col-span-2 mt-6">
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Add New Images</label>
                    <div class="space-y-4">
                        <!-- File Input -->
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer">
                            <div class="space-y-2">
                                <div class="flex justify-center">
                                    <i class="fas fa-plus-circle text-4xl text-gray-400"></i>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-gray-700">Click to add more images or drag and drop</p>
                                    <p class="text-sm text-gray-500">Support for JPEG, PNG, JPG, GIF, WEBP (Max: 2MB each)</p>
                                    <p class="text-sm text-gray-500">Maximum 10 images total</p>
                                </div>
                                <input type="file" id="images" name="images[]" multiple accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('images.*') border-red-500 @enderror">
                            </div>
                        </div>

                        <!-- Image Preview Container -->
                        <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 hidden">
                            <!-- Previews will be added here -->
                        </div>

                        <!-- Selected Files Count -->
                        <div id="selected-files-info" class="hidden">
                            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg flex justify-between items-center">
                                <p id="selected-files-text">0 images selected</p>
                                <button type="button" id="clear-images" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded transition-colors">
                                    Clear All
                                </button>
                            </div>
                        </div>
                    </div>

                    @error('images.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>

                    @enderror
                </div>
                @endif
                <!-- Is Featured -->
                <div class="md:col-span-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $property->is_featured) ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Mark as Featured</span>
                    </label>
                    @error('is_featured')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.properties.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Update Property
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script>
$(document).ready(function() {
    // Initialize Summernote editor
    $('#description').summernote({
        height: 400,
        minHeight: 300,
        maxHeight: 600,
        focus: true,
        placeholder: 'Enter detailed property description with rich formatting...',
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video', 'table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        styleTags: [
            'p',
            { title: 'Heading 1', tag: 'h1' },
            { title: 'Heading 2', tag: 'h2' },
            { title: 'Heading 3', tag: 'h3' },
            { title: 'Heading 4', tag: 'h4' },
            { title: 'Heading 5', tag: 'h5' },
            { title: 'Heading 6', tag: 'h6' }
        ],
        callbacks: {
            onInit: function() {
                $('.note-editor').css('border-radius', '8px');
                $('.note-editor').css('border', '1px solid #e5e7eb');
                $('.note-editor').css('box-shadow', '0 1px 3px rgba(0, 0, 0, 0.1)');
            }
        }
    });

    // Simple Image Upload Functionality
    const maxFiles = 10;
    const maxSize = 2 * 1024 * 1024; // 2MB
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    const existingImageCount = {{ $property->images->count() ?? 0 }};
    let storedFiles = []; // Store files separately from input

    // Handle file input change
    $('#images').on('change', function(e) {
        const files = e.target.files;
        handleFileSelection(files);
    });

    // Make upload area clickable
    $('.border-dashed').on('click', function(e) {
        if (!$(e.target).is('input')) {
            e.preventDefault();
            $('#images').click();
        }
    });

    // Handle drag and drop
    $('.border-dashed').on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('border-blue-400 bg-blue-50');
    });

    $('.border-dashed').on('dragleave', function(e) {
        e.preventDefault();
        $(this).removeClass('border-blue-400 bg-blue-50');
    });

    $('.border-dashed').on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('border-blue-400 bg-blue-50');

        const files = e.originalEvent.dataTransfer.files;
        handleFileSelection(files);
    });

    // Handle file selection
    function handleFileSelection(files) {
        const previewContainer = $('#image-preview-container');
        const selectedInfo = $('#selected-files-info');
        const selectedText = $('#selected-files-text');

        // Use stored files instead of input files to preserve existing ones
        const currentFiles = [...storedFiles];

        // Create a map of current files by name and size for easy lookup
        const currentFilesMap = new Map();
        currentFiles.forEach(file => {
            const key = `${file.name}_${file.size}`;
            currentFilesMap.set(key, file);
        });

        // Filter out duplicates from new files
        const newFiles = Array.from(files).filter(file => {
            const key = `${file.name}_${file.size}`;
            return !currentFilesMap.has(key);
        });

        // Combine current files with new unique files
        const allFiles = [...currentFiles, ...newFiles];

        // Validate files
        const validFiles = [];
        const errors = [];

        for (let i = 0; i < allFiles.length; i++) {
            const file = allFiles[i];

            if (existingImageCount + i >= maxFiles) {
                errors.push(`Maximum ${maxFiles} images allowed`);
                break;
            }

            if (!allowedTypes.includes(file.type)) {
                errors.push(`${file.name} is not a valid image type`);
                continue;
            }

            if (file.size > maxSize) {
                errors.push(`${file.name} is too large (max 2MB)`);
                continue;
            }

            validFiles.push(file);
        }

        // Show errors if any
        if (errors.length > 0) {
            alert(errors.join('\n'));
        }

        // Update stored files with valid files
        storedFiles = validFiles;

        // Show previews for valid files
        if (validFiles.length > 0) {
            previewContainer.removeClass('hidden');
            selectedInfo.removeClass('hidden');
            selectedText.text(`${validFiles.length} image${validFiles.length > 1 ? 's' : ''} selected`);

            // Clear and rebuild previews
            previewContainer.empty();
            validFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewHtml = `
                        <div class="relative group cursor-pointer">
                            <img src="${e.target.result}" alt="${file.name}" class="w-full h-32 object-cover rounded-lg shadow-md">
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                <div class="text-center">
                                    <div class="bg-red-500 text-white text-xs px-2 py-1 rounded mb-1">
                                        <i class="fas fa-trash"></i> Remove
                                    </div>
                                    <span class="bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">${file.name}</span>
                                </div>
                            </div>
                            <div class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    `;
                    previewContainer.append(previewHtml);
                };
                reader.readAsDataURL(file);
            });
        }

        // Update file input with all valid files
        const dataTransfer = new DataTransfer();
        validFiles.forEach(file => dataTransfer.items.add(file));
        $('#images')[0].files = dataTransfer.files;
    }

    // Clear all images
    $('#clear-images').on('click', function() {
        if (confirm('Are you sure you want to clear all selected images?')) {
            storedFiles = []; // Clear stored files
            $('#images')[0].files = new DataTransfer().files;
            $('#image-preview-container').empty().addClass('hidden');
            $('#selected-files-info').addClass('hidden');
        }
    });

    // Remove individual image on click
    $(document).on('click', '#image-preview-container .relative', function(e) {
        e.stopPropagation();
        const imgElement = $(this).find('img');
        const fileName = imgElement.attr('alt');

        if (confirm(`Remove ${fileName}?`)) {
            // Remove from stored files
            storedFiles = storedFiles.filter(file => file.name !== fileName);

            const dataTransfer = new DataTransfer();
            storedFiles.forEach(file => dataTransfer.items.add(file));
            $('#images')[0].files = dataTransfer.files;

            // Trigger file change to update UI
            $('#images').trigger('change');
        }
    });

    // Load districts when state changes
    $('#state_id').on('change', function() {
        const stateId = $(this).val();
        const districtSelect = $('#district_id');
        const municipalitySelect = $('#municipality_id');
        const currentDistrictId = {{ $property->district_id ?? 'null' }};

        // Reset district and municipality dropdowns
        districtSelect.html('<option value="">Select District</option>');
        municipalitySelect.html('<option value="">Select Municipality</option>');

        if (stateId) {
            $.ajax({
                url: '/admin/properties/districts/' + stateId,
                method: 'GET',
                success: function(data) {
                    districtSelect.html('<option value="">Select District</option>');
                    data.forEach(function(district) {
                        const selected = district.id === currentDistrictId ? 'selected' : '';
                        districtSelect.append(
                            '<option value="' + district.id + '" ' + selected + '>' + district.name + '</option>'
                        );
                    });
                },
                error: function() {
                    districtSelect.html('<option value="">Error loading districts</option>');
                }
            });
        }
    });

    // Load municipalities when district changes
    $('#district_id').on('change', function() {
        const districtId = $(this).val();
        const municipalitySelect = $('#municipality_id');
        const currentMunicipalityId = {{ $property->municipality_id ?? 'null' }};

        municipalitySelect.html('<option value="">Loading...</option>');

        if (districtId) {
            $.ajax({
                url: '/admin/properties/municipalities-by-district/' + districtId,
                method: 'GET',
                success: function(data) {
                    municipalitySelect.html('<option value="">Select Municipality</option>');
                    data.forEach(function(municipality) {
                        const selected = municipality.id === currentMunicipalityId ? 'selected' : '';
                        municipalitySelect.append(
                            '<option value="' + municipality.id + '" ' + selected + '>' + municipality.name + '</option>'
                        );
                    });
                },
                error: function() {
                    municipalitySelect.html('<option value="">Error loading municipalities</option>');
                }
            });
        } else {
            municipalitySelect.html('<option value="">Select Municipality</option>');
        }
    });

    // Initialize with current state's districts if state is selected
    const currentStateId = {{ $property->state_id ?? 'null' }};
    if (currentStateId) {
        $('#state_id').trigger('change');
    }

    // Land area conversion functionality
    function convertArea(value, fromUnit, toUnit) {
        // Convert everything to square feet first
        const toSqFt = {
            'sqft': 1,
            'sqm': 10.7639,
            'aana': 342.25,
            'ropani': 5476,
            'dhur': 182.25,
            'kattha': 3645,
            'bigha': 72900
        };

        // Convert from input unit to square feet
        const sqFtValue = value * (toSqFt[fromUnit] || 1);

        // Convert from square feet to target unit
        return sqFtValue / (toSqFt[toUnit] || 1);
    }

    function updateAreaConversions() {
        const value = parseFloat($('#land_area_size').val()) || 0;
        const unit = $('#land_area_unit').val();

        if (value <= 0) {
            $('#area-conversion').text('Enter area value to see conversions');
            return;
        }

        const conversions = [];

        // Calculate conversions to common units
        const sqFt = convertArea(value, unit, 'sqft');
        const sqM = convertArea(value, unit, 'sqm');
        const aana = convertArea(value, unit, 'aana');
        const ropani = convertArea(value, unit, 'ropani');
        const dhur = convertArea(value, unit, 'dhur');
        const kattha = convertArea(value, unit, 'kattha');
        const bigha = convertArea(value, unit, 'bigha');

        // Format conversions with appropriate precision
        if (sqFt < 10000) {
            conversions.push(`${sqFt.toFixed(2)} sq ft`);
        } else {
            conversions.push(`${(sqFt / 43560).toFixed(2)} acres`);
        }

        if (sqM < 10000) {
            conversions.push(`${sqM.toFixed(2)} sq m`);
        } else {
            conversions.push(`${(sqM / 10000).toFixed(2)} hectares`);
        }

        if (aana >= 0.01) conversions.push(`${aana.toFixed(2)} aana`);
        if (ropani >= 0.01) conversions.push(`${ropani.toFixed(2)} ropani`);
        if (dhur >= 0.01) conversions.push(`${dhur.toFixed(2)} dhur`);
        if (kattha >= 0.01) conversions.push(`${kattha.toFixed(2)} kattha`);
        if (bigha >= 0.01) conversions.push(`${bigha.toFixed(2)} bigha`);

        $('#area-conversion').html('≈ ' + conversions.join(' | '));
    }

    // Update conversions when input changes
    let isUpdating = false;
    $('#land_area_size, #land_area_unit').on('input change', function() {
        if (!isUpdating) {
            isUpdating = true;
            updateAreaConversions();
            setTimeout(() => {
                isUpdating = false;
            }, 10);
        }
    });

    // Initialize conversions on page load
    updateAreaConversions();

    // Handle form submission to sync Summernote content
    $('form').on('submit', function(e) {
        // Sync Summernote content to textarea before submission
        const summernoteContent = $('#description').summernote('code');
        $('#description').val(summernoteContent);
    });
});

// Delete image
function deleteImage(imageId) {
    if (!confirm('Are you sure you want to delete this image?')) {
        return;
    }

    $.ajax({
        url: '/admin/properties/{{ $property->id }}/images/' + imageId,
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function() {
            $('#image-' + imageId).fadeOut(300, function() {
                $(this).remove();
            });
        },
        error: function() {
            alert('Failed to delete image');
        }
    });
}

// Set primary image
function setPrimaryImage(imageId) {
    $.ajax({
        url: '/admin/properties/{{ $property->id }}/images/' + imageId + '/set-primary',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function() {
            location.reload();
        },
        error: function() {
            alert('Failed to set primary image');
        }
    });
}
</script>
@endpush
