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
        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" id="property-form">
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

                <!-- District -->
                <div>
                    <label for="district_id" class="block text-sm font-medium text-gray-700 mb-2">District</label>
                    <select id="district_id" name="district_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('district_id') border-red-500 @enderror">
                        <option value="">Select District</option>
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
                    <div class="flex gap-2">
                        <input type="number" id="land_area_size" name="land_area_size" value="{{ old('land_area_size') }}" step="0.01" min="0"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('land_area_size') border-red-500 @enderror"
                            placeholder="Enter area value">
                        <select id="land_area_unit" name="land_area_unit"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('land_area_unit') border-red-500 @enderror">
                            <option value="sqft" {{ old('land_area_unit', 'sqft') == 'sqft' ? 'selected' : '' }}>Sq Ft</option>
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
                    <textarea id="description" name="description" rows="10"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Images -->
                <div class="md:col-span-2">
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Property Images</label>
                    <div class="space-y-4">
                        <!-- File Input -->
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer" id="image-upload-area">
                            <div class="relative z-10">
                                <p class="text-lg font-medium text-gray-700">Click to browse or drag and drop images</p>
                                <p class="text-sm text-gray-500">Support for JPEG, PNG, JPG, GIF, WEBP (Max: 2MB each)</p>
                                <p class="text-sm text-gray-500">Maximum 10 images</p>
                            </div>
                            <input type="file" id="images" name="images[]" multiple accept="image/*"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                        </div>

                        <div class="flex flex-wrap items-center gap-3 mt-3">
                            <button type="button" id="add-more-images-button" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Add more images
                            </button>
                            <button type="button" id="clear-selected-images" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition hidden">
                                Clear selected
                            </button>
                        </div>

                        <!-- Image Preview Area -->
                        <div id="image-preview-area" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <div id="image-preview-placeholder" class="col-span-full text-gray-500 text-center py-8 border border-dashed border-gray-200 rounded-lg">
                                No images selected yet.
                            </div>
                        </div>

                        <!-- Selected Files Info -->
                        <div id="selected-files-info" class="mt-4 hidden">
                            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg flex justify-between items-center">
                                <p id="selected-files-text">0 images selected</p>
                            </div>
                        </div>
                    </div>

                        @error('images.*')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

    <!-- Is Featured -->
                <div class="md:col-span-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Mark as Featured</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                        Create Property
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
// Fallback to vanilla JavaScript if jQuery fails
window.loadDistricts = function(stateId) {
    console.log('Loading districts for state:', stateId);
    const districtSelect = document.getElementById('district_id');
    const municipalitySelect = document.getElementById('municipality_id');

    // Reset dropdowns
    districtSelect.innerHTML = '<option value="">Select District</option>';
    municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';

    if (stateId) {
        districtSelect.innerHTML = '<option value="">Loading districts...</option>';

        // Using fetch API as fallback
        fetch('/admin/properties/districts/' + stateId)
            .then(response => response.json())
            .then(data => {
                console.log('Districts loaded:', data);
                districtSelect.innerHTML = '<option value="">Select District</option>';
                if (data && data.length > 0) {
                    data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id;
                        option.textContent = district.name;
                        districtSelect.appendChild(option);
                    });
                } else {
                    districtSelect.innerHTML = '<option value="">No districts found</option>';
                }
            })
            .catch(error => {
                console.error('Error loading districts:', error);
                districtSelect.innerHTML = '<option value="">Error loading districts</option>';
            });
    }
};

window.loadMunicipalities = function(districtId) {
    console.log('Loading municipalities for district:', districtId);
    const municipalitySelect = document.getElementById('municipality_id');

    municipalitySelect.innerHTML = '<option value="">Loading...</option>';

    if (districtId) {
        // Using fetch API as fallback
        fetch('/admin/properties/municipalities-by-district/' + districtId)
            .then(response => response.json())
            .then(data => {
                console.log('Municipalities loaded:', data);
                municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
                if (data && data.length > 0) {
                    data.forEach(municipality => {
                        const option = document.createElement('option');
                        option.value = municipality.id;
                        option.textContent = municipality.name;
                        municipalitySelect.appendChild(option);
                    });
                } else {
                    municipalitySelect.innerHTML = '<option value="">No municipalities found</option>';
                }
            })
            .catch(error => {
                console.error('Error loading municipalities:', error);
                municipalitySelect.innerHTML = '<option value="">Error loading municipalities</option>';
            });
    } else {
        municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
    }
};

// Image Upload Logic
function initImageUpload() {
    const maxFiles = 10;
    const maxSize = 2 * 1024 * 1024; // 2MB
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    let selectedFiles = [];

    const imageUploadArea = document.getElementById('image-upload-area');
    const imagesInput = document.getElementById('images');
    const addMoreButton = document.getElementById('add-more-images-button');
    const clearSelectedButton = document.getElementById('clear-selected-images');
    const previewArea = document.getElementById('image-preview-area');
    const selectedInfo = document.getElementById('selected-files-info');
    const selectedText = document.getElementById('selected-files-text');

    if (!imagesInput) {
        return;
    }

    updatePreview();

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        imagesInput.files = dataTransfer.files;
        if (selectedFiles.length === 0) {
            imagesInput.value = '';
        }
    }

    function updatePreview() {
        previewArea.innerHTML = '';

        if (selectedFiles.length === 0) {
            if (selectedInfo) selectedInfo.classList.add('hidden');
            if (clearSelectedButton) clearSelectedButton.classList.add('hidden');

            const placeholder = document.createElement('div');
            placeholder.id = 'image-preview-placeholder';
            placeholder.className = 'col-span-full text-gray-500 text-center py-8 border border-dashed border-gray-200 rounded-lg';
            placeholder.textContent = 'No images selected yet.';
            previewArea.appendChild(placeholder);
            return;
        }

        if (selectedInfo) selectedInfo.classList.remove('hidden');
        if (clearSelectedButton) clearSelectedButton.classList.remove('hidden');
        if (selectedText) selectedText.textContent = `${selectedFiles.length} image${selectedFiles.length > 1 ? 's' : ''} selected`;

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewHtml = `
                    <div class="relative group">
                        <img src="${e.target.result}" alt="${file.name}" class="w-full h-32 object-cover rounded-lg shadow-md">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                            <button type="button" class="bg-red-500 text-white text-xs px-2 py-1 rounded" onclick="removeImage(${index})">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                `;
                previewArea.innerHTML += previewHtml;
            };
            reader.readAsDataURL(file);
        });
    }

    function handleFiles(files) {
        if (!files || files.length === 0) {
            updatePreview();
            return;
        }

        const newFiles = Array.from(files).filter(newFile => {
            return !selectedFiles.some(existingFile =>
                existingFile.name === newFile.name && existingFile.size === newFile.size
            );
        });

        selectedFiles = [...selectedFiles, ...newFiles];

        const validFiles = [];
        const errors = [];

        for (let i = 0; i < selectedFiles.length; i++) {
            const file = selectedFiles[i];

            if (i >= maxFiles) {
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

        if (errors.length > 0) {
            alert(errors.join('\n'));
        }

        selectedFiles = validFiles;
        updateFileInput();
        updatePreview();
    }

    if (imageUploadArea) {
        imageUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-blue-400', 'bg-blue-50');
        });

        imageUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-blue-400', 'bg-blue-50');
        });

        imageUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-blue-400', 'bg-blue-50');
            handleFiles(e.dataTransfer.files);
        });
    }

    if (imagesInput) {
        imagesInput.addEventListener('dragover', function(e) {
            e.preventDefault();
            imageUploadArea?.classList.add('border-blue-400', 'bg-blue-50');
        });

        imagesInput.addEventListener('dragleave', function(e) {
            e.preventDefault();
            imageUploadArea?.classList.remove('border-blue-400', 'bg-blue-50');
        });

        imagesInput.addEventListener('drop', function(e) {
            e.preventDefault();
            imageUploadArea?.classList.remove('border-blue-400', 'bg-blue-50');
            handleFiles(e.dataTransfer.files);
        });
    }

    imagesInput.addEventListener('change', function(e) {
        handleFiles(e.target.files);
    });

    if (addMoreButton) {
        addMoreButton.addEventListener('click', function() {
            imagesInput.value = '';
            imagesInput.click();
        });
    }

    if (clearSelectedButton) {
        clearSelectedButton.addEventListener('click', function() {
            if (!confirm('Clear all selected images?')) {
                return;
            }
            selectedFiles = [];
            updateFileInput();
            updatePreview();
        });
    }

    window.removeImage = function(index) {
        if (typeof selectedFiles[index] === 'undefined') {
            return;
        }

        if (!confirm(`Remove ${selectedFiles[index].name}?`)) {
            return;
        }

        selectedFiles.splice(index, 1);
        updateFileInput();
        updatePreview();
    };
}

function convertArea(value, fromUnit, toUnit) {
    const toSqFt = {
        sqft: 1,
        sqm: 10.7639,
        aana: 342.25,
        ropani: 5476,
        dhur: 182.25,
        kattha: 3645,
        bigha: 72900
    };

    if (!toSqFt[fromUnit] || !toSqFt[toUnit]) {
        return 0;
    }

    const sqFt = value * toSqFt[fromUnit];
    return sqFt / toSqFt[toUnit];
}

function updateAreaConversions() {
    const input = document.getElementById('land_area_size');
    const unitSelect = document.getElementById('land_area_unit');
    const result = document.getElementById('area-conversion');

    if (!input || !unitSelect || !result) {
        return;
    }

    const value = parseFloat(input.value);
    const unit = unitSelect.value;

    if (!value || value <= 0) {
        result.textContent = 'Enter area value to see conversions';
        return;
    }

    const units = ['sqft', 'sqm', 'aana', 'ropani', 'dhur', 'kattha', 'bigha'];
    const labels = {
        sqft: 'Sq Ft',
        sqm: 'Sq M',
        aana: 'Aana',
        ropani: 'Ropani',
        dhur: 'Dhur',
        kattha: 'Kattha',
        bigha: 'Bigha'
    };

    const conversions = units
        .filter(u => u !== unit)
        .map(u => {
            const converted = convertArea(value, unit, u);
            return `${converted.toFixed(2)} ${labels[u]}`;
        });

    result.textContent = `≈ ${conversions.join(' | ')}`;
}

function initAreaConversions() {
    const input = document.getElementById('land_area_size');
    const unitSelect = document.getElementById('land_area_unit');

    if (!input || !unitSelect) {
        return;
    }

    input.addEventListener('input', updateAreaConversions);
    unitSelect.addEventListener('change', updateAreaConversions);
    updateAreaConversions();
}

let descriptionEditor = null;
function initCKEditor() {
    const descriptionField = document.getElementById('description');
    if (!descriptionField || typeof ClassicEditor === 'undefined') {
        return;
    }

    ClassicEditor.create(descriptionField)
        .then(editor => {
            descriptionEditor = editor;
        })
        .catch(error => {
            console.error('CKEditor init failed:', error);
        });

    const propertyForm = document.getElementById('property-form');
    if (propertyForm) {
        propertyForm.addEventListener('submit', function() {
            if (descriptionEditor) {
                descriptionField.value = descriptionEditor.getData();
            }
        });
    }
}

// Check if jQuery is loaded and use it if available
if (typeof jQuery !== 'undefined') {
    console.log('Using jQuery');

    $(document).ready(function() {
        console.log('Document ready with jQuery');

        const stateSelect = document.getElementById('state_id');
        const districtSelect = document.getElementById('district_id');

        if (stateSelect) {
            stateSelect.addEventListener('change', function() {
                loadDistricts(this.value);
            });
        }

        if (districtSelect) {
            districtSelect.addEventListener('change', function() {
                loadMunicipalities(this.value);
            });
        }

        initImageUpload();
        initAreaConversions();
        initCKEditor();
    });
} else {
    console.log('jQuery not loaded, using vanilla JavaScript');

    document.addEventListener('DOMContentLoaded', function() {
        console.log('Document ready with vanilla JS');

        const stateSelect = document.getElementById('state_id');
        const districtSelect = document.getElementById('district_id');

        if (stateSelect) {
            stateSelect.addEventListener('change', function() {
                loadDistricts(this.value);
            });
        }

        if (districtSelect) {
            districtSelect.addEventListener('change', function() {
                loadMunicipalities(this.value);
            });
        }

        initImageUpload();
        initAreaConversions();
        initCKEditor();
    });
}
</script>
@endpush
