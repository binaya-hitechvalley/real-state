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
                    <input type="text" id="land_area_size" name="land_area_size" value="{{ old('land_area_size', $property->land_area_size) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('land_area_size') border-red-500 @enderror"
                        placeholder="e.g., 1000 sq ft">
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
                    <textarea id="description" name="description" rows="5"
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
                </div>
                @endif

                <!-- New Images -->
                <div class="md:col-span-2">
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Add New Images</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('images.*') border-red-500 @enderror">
                    @error('images.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Select multiple images (JPEG, PNG, JPG, GIF, WEBP - Max: 2MB each)</p>
                </div>

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
<script>
$(document).ready(function() {
    // Load municipalities when state changes
    $('#state_id').on('change', function() {
        const stateId = $(this).val();
        const municipalitySelect = $('#municipality_id');
        const currentMunicipalityId = {{ $property->municipality_id ?? 'null' }};
        
        municipalitySelect.html('<option value="">Loading...</option>');
        
        if (stateId) {
            $.ajax({
                url: '/admin/properties/municipalities/' + stateId,
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
