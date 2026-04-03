@extends('frontend.layouts.master')

@section('title', 'Property Search | Sapphire Investment')

@push('styles')
<style>
    input[type=range] { -webkit-appearance: none; width: 100%; background: transparent; }
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none; height: 20px; width: 20px; border-radius: 50%;
        background: #0ea5e9; border: 2px solid white; cursor: pointer;
        margin-top: -8px; box-shadow: 0 2px 6px rgba(14, 165, 233, 0.4);
    }
    input[type=range]::-webkit-slider-runnable-track {
        width: 100%; height: 6px; cursor: pointer;
        background: #e2e8f0; border-radius: 999px;
    }
    input[type=range]:focus { outline: none; }
    
    .filter-checkbox {
        appearance: none; background-color: #fff; margin: 0; font: inherit;
        color: currentColor; width: 1.15em; height: 1.15em; border: 2px solid #cbd5e1;
        border-radius: 0.25em; display: grid; place-content: center; transition: 0.2s all;
    }
    .filter-checkbox::before {
        content: ""; width: 0.65em; height: 0.65em; transform: scale(0);
        transition: 120ms transform ease-in-out; box-shadow: inset 1em 1em white;
        background-color: transparent; transform-origin: center;
        clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
    }
    .filter-checkbox:checked { background-color: #3b82f6; border-color: #3b82f6; }
    .filter-checkbox:checked::before { transform: scale(1); }

    .property-card { transition: all 0.3s ease; }
    .property-card:hover { transform: translateY(-4px); }
</style>
@endpush

@section('content')

<!-- ==========================================
     PAGE HEADER
     ========================================== -->
<section class="pt-32 pb-12 bg-slate-900 border-b border-primary/20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] opacity-10 bg-cover bg-center mix-blend-overlay"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-4">
            Discover Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Next Property</span>
        </h1>
        <p class="text-lg text-slate-300 font-medium">Browse our exclusive collection of <span class="text-white font-bold">{{ $totalProperties }}</span> premium real estate listings.</p>
    </div>
</section>

<!-- ==========================================
     MAIN LISTING & FILTER SECTION
     ========================================== -->
<section class="py-12 bg-slate-50 relative z-10">
    <div class="container mx-auto px-4 md:px-8">
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Left Sidebar: Advanced Filters -->
            <div class="w-full lg:w-1/4">
                
                <!-- Mobile Filter Toggle -->
                <button id="mobileFilterToggle" class="lg:hidden w-full py-3 mb-4 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl flex items-center justify-center gap-2 shadow-sm">
                    <i class="fas fa-filter"></i> Select Filters
                </button>

                <div id="filterSidebar" class="hidden lg:block bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm sticky top-28 transition-all duration-300">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <h3 class="font-black text-slate-900 text-lg"><i class="fas fa-sliders-h text-primary mr-2"></i> Filters</h3>
                        <a href="{{ route('frontend.properties.index') }}" class="text-xs font-bold text-accent hover:underline">Reset All</a>
                    </div>
                    
                    <form action="{{ route('frontend.properties.index') }}" method="GET" class="space-y-8">
                        
                        <!-- Search Box -->
                        <div>
                            <div class="relative">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search location, name..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-sm font-medium focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Business Type (Sale/Rent) -->
                        @if($businessTypes->isNotEmpty())
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Status</h4>
                            <div class="flex bg-slate-100 p-1 rounded-xl">
                                <label class="flex-1 text-center py-2 rounded-lg cursor-pointer transition-colors relative">
                                    <input type="radio" name="business_type" value="" {{ !request('business_type') ? 'checked' : '' }} class="peer sr-only">
                                    <span class="text-sm font-bold text-slate-500 peer-checked:text-slate-900 block relative w-full h-full z-10 transition-colors">Any</span>
                                    <div class="absolute inset-0 bg-white rounded-lg shadow-sm transform scale-90 opacity-0 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-0"></div>
                                </label>
                                @foreach($businessTypes as $bt)
                                <label class="flex-1 text-center py-2 rounded-lg cursor-pointer transition-colors relative">
                                    <input type="radio" name="business_type" value="{{ $bt->id }}" {{ request('business_type') == $bt->id ? 'checked' : '' }} class="peer sr-only">
                                    <span class="text-sm font-bold text-slate-500 peer-checked:text-slate-900 block relative w-full h-full z-10 transition-colors">{{ $bt->name }}</span>
                                    <div class="absolute inset-0 bg-white rounded-lg shadow-sm transform scale-90 opacity-0 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-0"></div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Property Type (Checkboxes) -->
                        @if($propertyTypes->isNotEmpty())
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Property Type</h4>
                            <div class="space-y-3">
                                @foreach($propertyTypes as $pt)
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" name="property_types[]" value="{{ $pt->id }}" class="filter-checkbox"
                                        {{ is_array(request('property_types')) && in_array($pt->id, request('property_types')) ? 'checked' : '' }}>
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors flex-1">{{ $pt->name }}</span>
                                    <span class="text-xs text-slate-400 font-bold bg-slate-50 px-2 py-0.5 rounded-full">{{ $pt->properties_count }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Price Range -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Price Range</h4>
                                <span class="text-xs font-bold text-primary bg-blue-50 px-2 py-1 rounded-md" id="priceDisplay">
                                    Rs. {{ number_format(request('min_price', 0)) }} - Rs. {{ number_format(request('max_price', $maxPropertyPrice)) }}
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Min Price</label>
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0" 
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:border-primary outline-none">
                                </div>
                                <div>
                                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 block">Max Price</label>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="{{ number_format($maxPropertyPrice, 0, '', '') }}" 
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:border-primary outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Location</h4>
                            <div class="space-y-3">
                                <!-- State / Province -->
                                <div class="relative">
                                    <select name="state" id="filterState" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-4 pr-10 text-sm font-medium appearance-none focus:border-primary focus:ring-1 outline-none cursor-pointer">
                                        <option value="">Select Province</option>
                                        @foreach($states as $st)
                                            <option value="{{ $st->id }}" {{ request('state') == $st->id ? 'selected' : '' }}>
                                                {{ $st->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>

                                <!-- District -->
                                <div class="relative">
                                    <select name="district" id="filterDistrict" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-4 pr-10 text-sm font-medium appearance-none focus:border-primary focus:ring-1 outline-none cursor-pointer {{ count($districts) == 0 ? 'opacity-50' : '' }}" {{ count($districts) == 0 ? 'disabled' : '' }}>
                                        <option value="">Select District</option>
                                        @foreach($districts as $dist)
                                            <option value="{{ $dist->id }}" {{ request('district') == $dist->id ? 'selected' : '' }}>
                                                {{ $dist->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>

                                <!-- Municipality -->
                                <div class="relative">
                                    <select name="municipality" id="filterMunicipality" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-4 pr-10 text-sm font-medium appearance-none focus:border-primary focus:ring-1 outline-none cursor-pointer {{ count($municipalities) == 0 ? 'opacity-50' : '' }}" {{ count($municipalities) == 0 ? 'disabled' : '' }}>
                                        <option value="">Select Municipality</option>
                                        @foreach($municipalities as $muni)
                                            <option value="{{ $muni->id }}" {{ request('municipality') == $muni->id ? 'selected' : '' }}>
                                                {{ $muni->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Only -->
                        <div>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" name="featured" value="1" class="filter-checkbox" {{ request('featured') ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i> Featured Only
                                </span>
                            </label>
                        </div>

                        <!-- Preserve sort -->
                        <input type="hidden" name="sort" value="{{ request('sort', 'newest') }}">

                        <button type="submit" class="w-full py-4 bg-slate-900 text-white font-bold rounded-xl hover:bg-primary transition-all flex justify-center items-center gap-2 shadow-lg hover:-translate-y-0.5 mt-4">
                            Apply Filters <i class="fas fa-arrow-right text-sm"></i>
                        </button>

                    </form>
                </div>
            </div>

            <!-- Right Column: Property Grid -->
            <div class="w-full lg:w-3/4">
                
                <!-- Listing Header & Sort -->
                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-2xl p-4 border border-slate-200 shadow-sm mb-6 gap-4">
                    <p class="text-sm font-bold text-slate-600">
                        <span class="text-slate-900 font-black">{{ $properties->total() }}</span> 
                        {{ Str::plural('Property', $properties->total()) }} Found
                        @if(request('search'))
                            <span class="text-slate-400">for "{{ request('search') }}"</span>
                        @endif
                    </p>
                    
                    <div class="flex items-center gap-3">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sort By:</label>
                        <div class="relative">
                            <select id="sortSelect" class="bg-slate-50 border border-slate-200 rounded-lg py-2 pl-4 pr-10 text-sm font-bold text-slate-700 appearance-none focus:border-primary outline-none cursor-pointer">
                                <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured First</option>
                                <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest Added</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                            <i class="fas fa-sort absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                @if($properties->isNotEmpty())
                <!-- Properties Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
                    
                    @foreach($properties as $property)
                    <div class="property-card group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100">
                        <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                            @if($property->primaryImage && $property->primaryImage->url)
                                <img src="{{ $property->primaryImage->url }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                                    <i class="fas fa-home text-slate-400 text-4xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex gap-2">
                                @if($property->businessType)
                                    <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-primary text-[10px] font-black tracking-wider uppercase shadow-sm">
                                        {{ $property->businessType->name }}
                                    </span>
                                @endif
                                @if($property->is_featured)
                                    <span class="px-3 py-1 bg-accent text-white backdrop-blur rounded-full text-[10px] font-black tracking-wider uppercase shadow-sm">
                                        <i class="fas fa-star mr-0.5"></i> Featured
                                    </span>
                                @endif
                            </div>

                            <!-- Wishlist -->
                            <div class="absolute top-3 right-3">
                                <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>

                            <!-- Image count -->
                            @if($property->images_count ?? $property->images->count() > 0)
                            <div class="absolute bottom-3 left-3">
                                <span class="px-2.5 py-1 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold rounded-full">
                                    <i class="fas fa-camera mr-1"></i> {{ $property->images->count() }}
                                </span>
                            </div>
                            @endif
                        </div>

                        <div class="p-5">
                            <!-- Price -->
                            <div class="text-xl font-black text-slate-900 mb-1">
                                Rs. {{ number_format($property->price, 0) }}
                                @if($property->price_period)
                                    <span class="text-xs text-slate-400 font-medium">/{{ $property->price_period }}</span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-base font-bold text-slate-800 mb-1 truncate relative">
                                <a href="{{ route('frontend.properties.show', $property->slug) }}" class="hover:text-primary transition-colors">
                                    {{ $property->title }}
                                </a>
                            </h3>

                            <!-- Location -->
                            <p class="text-slate-500 text-xs font-medium mb-4 truncate">
                                <i class="fas fa-map-marker-alt text-accent mr-1"></i>
                                @if($property->municipality && $property->district)
                                    {{ $property->municipality->name }}, {{ $property->district->name }}
                                @elseif($property->municipality)
                                    {{ $property->municipality->name }}
                                @elseif($property->address)
                                    {{ $property->address }}
                                @else
                                    Location Not Specified
                                @endif
                            </p>
                            
                            <!-- Features -->
                            <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                    @if($property->land_area_size)
                                        <span title="Area" class="flex items-center gap-1">
                                            <i class="fas fa-vector-square text-primary/70"></i> 
                                            {{ $property->land_area_size }} {{ $property->land_area_unit ?? 'sqft' }}
                                        </span>
                                    @endif
                                    @if($property->propertyType)
                                        <span title="Type" class="flex items-center gap-1">
                                            <i class="fas fa-building text-primary/70"></i> 
                                            {{ $property->propertyType->name }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Pagination -->
                @if($properties->hasPages())
                <div class="flex justify-center mt-8">
                    <nav class="inline-flex bg-white rounded-full p-1 border border-slate-200 shadow-sm">
                        {{-- Previous --}}
                        @if($properties->onFirstPage())
                            <span class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 opacity-50"><i class="fas fa-chevron-left text-sm"></i></span>
                        @else
                            <a href="{{ $properties->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 hover:text-primary hover:bg-blue-50 transition-colors"><i class="fas fa-chevron-left text-sm"></i></a>
                        @endif

                        {{-- Pages --}}
                        @foreach($properties->getUrlRange(max(1, $properties->currentPage() - 2), min($properties->lastPage(), $properties->currentPage() + 2)) as $page => $url)
                            @if($page == $properties->currentPage())
                                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white font-bold shadow-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-600 font-bold hover:bg-slate-100 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if($properties->hasMorePages())
                            <a href="{{ $properties->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 hover:text-primary hover:bg-blue-50 transition-colors"><i class="fas fa-chevron-right text-sm"></i></a>
                        @else
                            <span class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 opacity-50"><i class="fas fa-chevron-right text-sm"></i></span>
                        @endif
                    </nav>
                </div>
                @endif

                @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl p-16 text-center border border-slate-200 shadow-sm">
                    <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-search text-slate-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-3">No Properties Found</h3>
                    <p class="text-slate-500 font-medium mb-6 max-w-md mx-auto">
                        We couldn't find any properties matching your criteria. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('frontend.properties.index') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white font-bold px-8 py-3 rounded-xl hover:bg-primary transition-colors">
                        <i class="fas fa-redo text-sm"></i> Clear All Filters
                    </a>
                </div>
                @endif

            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Sort handler - update URL when sort changes
    document.getElementById('sortSelect').addEventListener('change', function() {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', this.value);
        url.searchParams.delete('page'); // reset to page 1
        window.location.href = url.toString();
    });

    // Mobile Filter Toggle
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('mobileFilterToggle');
        const filterSidebar = document.getElementById('filterSidebar');
        
        if (toggleBtn && filterSidebar) {
            toggleBtn.addEventListener('click', () => {
                filterSidebar.classList.toggle('hidden');
            });
        }
    });

    // Cascading Location Dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        const stateSelect = document.getElementById('filterState');
        const districtSelect = document.getElementById('filterDistrict');
        const municipalitySelect = document.getElementById('filterMunicipality');

        // State change -> fetch districts
        stateSelect.addEventListener('change', function() {
            const stateId = this.value;
            
            // Reset districts and municipalities
            districtSelect.innerHTML = '<option value="">Select District</option>';
            districtSelect.disabled = true;
            districtSelect.classList.add('opacity-50');
            
            municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
            municipalitySelect.disabled = true;
            municipalitySelect.classList.add('opacity-50');

            if(stateId) {
                fetch(`/api/districts/${stateId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(dist => {
                            const option = document.createElement('option');
                            option.value = dist.id;
                            option.textContent = dist.name;
                            districtSelect.appendChild(option);
                        });
                        districtSelect.disabled = false;
                        districtSelect.classList.remove('opacity-50');
                    });
            }
        });

        // District change -> fetch municipalities
        districtSelect.addEventListener('change', function() {
            const districtId = this.value;
            
            // Reset municipalities
            municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
            municipalitySelect.disabled = true;
            municipalitySelect.classList.add('opacity-50');

            if(districtId) {
                fetch(`/api/municipalities/${districtId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(muni => {
                            const option = document.createElement('option');
                            option.value = muni.id;
                            option.textContent = muni.name;
                            municipalitySelect.appendChild(option);
                        });
                        municipalitySelect.disabled = false;
                        municipalitySelect.classList.remove('opacity-50');
                    });
            }
        });
    });
</script>
@endpush
