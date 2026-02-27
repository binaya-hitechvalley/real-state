@extends('admin.layouts.master')

@section('title', 'Create Property')

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create Property</h1>
            <p class="text-gray-600 mt-1">Add a new property</p>
        </div>
        <a href="{{ route('admin.properties.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="md:col-span-2">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                        placeholder="Auto-generated from title">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Leave blank to auto-generate from title</p>
                </div>

                <!-- Property Type -->
                <div>
                    <label for="property_type_id" class="block text-sm font-medium text-gray-700 mb-2">Property Type <span class="text-red-500">*</span></label>
                    <select id="property_type_id" name="property_type_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('property_type_id') border-red-500 @enderror">
                        <option value="">Select Property Type</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}" {{ old('property_type_id') == $type->id ? 'selected' : '' }}>
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
                            <option value="{{ $type->id }}" {{ old('business_type_id') == $type->id ? 'selected' : '' }}>
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
                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
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
                    </select>
                    @error('municipality_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0"
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
                        <option value="total" {{ old('price_period') == 'total' ? 'selected' : '' }}>Total</option>
                        <option value="monthly" {{ old('price_period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="yearly" {{ old('price_period') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                    @error('price_period')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Land Area Size -->
                <div>
                    <label for="land_area_size" class="block text-sm font-medium text-gray-700 mb-2">Land Area Size</label>
                    <input type="text" id="land_area_size" name="land_area_size" value="{{ old('land_area_size') }}"
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
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Rented</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror">
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Latitude -->
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                    <input type="number" id="latitude" name="latitude" value="{{ old('latitude') }}" step="0.00000001" min="-90" max="90"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('latitude') border-red-500 @enderror">
                    @error('latitude')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Longitude -->
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                    <input type="number" id="longitude" name="longitude" value="{{ old('longitude') }}" step="0.00000001" min="-180" max="180"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('longitude') border-red-500 @enderror">
                    @error('longitude')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Images -->
                <div class="md:col-span-2">
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Images</label>
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
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
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
                    <i class="fas fa-save mr-2"></i>Create Property
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
        
        municipalitySelect.html('<option value="">Loading...</option>');
        
        if (stateId) {
            $.ajax({
                url: '/admin/properties/municipalities/' + stateId,
                method: 'GET',
                success: function(data) {
                    municipalitySelect.html('<option value="">Select Municipality</option>');
                    data.forEach(function(municipality) {
                        municipalitySelect.append(
                            '<option value="' + municipality.id + '">' + municipality.name + '</option>'
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
</script>
@endpush
