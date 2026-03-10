@extends('frontend.layouts.master')

@section('title', 'Property Search | Sapphire Investment')

@push('styles')
<style>
    /* Styling for the custom range sliders */
    input[type=range] {
        -webkit-appearance: none; width: 100%; background: transparent; 
    }
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
</style>
@endpush

@section('content')

<!-- ==========================================
     PAGE HEADER & SEARCH OVERVIEW
     ========================================== -->
<section class="pt-32 pb-12 bg-slate-900 border-b border-primary/20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] opacity-10 bg-cover bg-center mix-blend-overlay"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-4">
            Discover Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Next Property</span>
        </h1>
        <p class="text-lg text-slate-300 font-medium">Browse our exclusive collection of 250+ premium real estate listings.</p>
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
                        <a href="#" class="text-xs font-bold text-accent hover:underline">Reset All</a>
                    </div>
                    
                    <form action="#" method="GET" class="space-y-8">
                        
                        <!-- Search Box -->
                        <div>
                            <div class="relative">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="text" placeholder="Search location, name..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-sm font-medium focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Property Status -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Status</h4>
                            <div class="flex bg-slate-100 p-1 rounded-xl">
                                <label class="flex-1 text-center py-2 rounded-lg cursor-pointer transition-colors relative">
                                    <input type="radio" name="status" value="any" checked class="peer sr-only">
                                    <span class="text-sm font-bold text-slate-500 peer-checked:text-slate-900 block relative w-full h-full z-10 transition-colors">Any</span>
                                    <div class="absolute inset-0 bg-white rounded-lg shadow-sm transform scale-90 opacity-0 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-0"></div>
                                </label>
                                <label class="flex-1 text-center py-2 rounded-lg cursor-pointer transition-colors relative">
                                    <input type="radio" name="status" value="sale" class="peer sr-only">
                                    <span class="text-sm font-bold text-slate-500 peer-checked:text-slate-900 block relative w-full h-full z-10 transition-colors">Buy</span>
                                    <div class="absolute inset-0 bg-white rounded-lg shadow-sm transform scale-90 opacity-0 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-0"></div>
                                </label>
                                <label class="flex-1 text-center py-2 rounded-lg cursor-pointer transition-colors relative">
                                    <input type="radio" name="status" value="rent" class="peer sr-only">
                                    <span class="text-sm font-bold text-slate-500 peer-checked:text-slate-900 block relative w-full h-full z-10 transition-colors">Rent</span>
                                    <div class="absolute inset-0 bg-white rounded-lg shadow-sm transform scale-90 opacity-0 peer-checked:opacity-100 peer-checked:scale-100 transition-all z-0"></div>
                                </label>
                            </div>
                        </div>

                        <!-- Property Category (Checkboxes) -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Category</h4>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="filter-checkbox" checked>
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">Residential House</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">Apartments</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">Commercial Space</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">Plotted Land</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Range Slider -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Price Range</h4>
                                <span class="text-xs font-bold text-primary bg-blue-50 px-2 py-1 rounded-md" id="priceDisplay">₹ 0 - ₹ 20 Cr</span>
                            </div>
                            <input type="range" min="0" max="20" value="10" step="1" id="priceRange" oninput="updatePrice(this.value)">
                            <div class="flex justify-between mt-2 text-[10px] font-bold text-slate-400">
                                <span>Min</span>
                                <span>Max</span>
                            </div>
                        </div>

                        <!-- Location Select -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Location Focus</h4>
                            <div class="relative">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-4 pr-10 text-sm font-medium appearance-none focus:border-primary focus:ring-1 object-none outline-none cursor-pointer">
                                    <option value="all">All Locations (Kathmandu Valley)</option>
                                    <option value="lalitpur">Lalitpur (Bhaisepati, Sanepa...)</option>
                                    <option value="boudha">Boudha & Jorpati</option>
                                    <option value="budhanilkantha">Budhanilkantha</option>
                                    <option value="core_ktm">Core Kathmandu City</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                            </div>
                        </div>

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
                    <p class="text-sm font-bold text-slate-600"><span class="text-slate-900 font-black">24</span> Properties Found</p>
                    
                    <div class="flex items-center gap-3">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sort By:</label>
                        <div class="relative">
                            <select class="bg-slate-50 border border-slate-200 rounded-lg py-2 pl-4 pr-10 text-sm font-bold text-slate-700 appearance-none focus:border-primary outline-none cursor-pointer">
                                <option value="featured">Featured First</option>
                                <option value="newest">Newest Added</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                            </select>
                            <i class="fas fa-sort absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                        </div>
                        <div class="flex bg-slate-100 p-1 rounded-lg ml-2">
                             <button class="w-8 h-8 rounded text-slate-900 bg-white shadow-sm flex items-center justify-center"><i class="fas fa-th-large"></i></button>
                             <button class="w-8 h-8 rounded text-slate-400 hover:text-slate-900 flex items-center justify-center transition-colors"><i class="fas fa-list"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Properties Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
                    
                    <!-- Property Card 1 -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Villa" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-primary text-[10px] font-black tracking-wider uppercase shadow-sm">For Sale</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-3 left-3">
                                <span class="px-2.5 py-1 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold rounded-full"><i class="fas fa-camera mr-1"></i> 5</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="text-xl font-black text-slate-900 mb-1">Rs. 4.5 Cr</div>
                            <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="/properties/demo" class="hover:text-primary transition-colors after:absolute after:inset-0">Modern Villa in City</a></h3>
                            <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Boudha, Kathmandu</p>
                            
                            <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                    <span title="Beds" class="flex items-center gap-1"><i class="fas fa-bed text-primary/70"></i> 4</span>
                                    <span title="Baths" class="flex items-center gap-1"><i class="fas fa-bath text-primary/70"></i> 3</span>
                                    <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 6 Aana</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 2 -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Bungalow" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-primary text-[10px] font-black tracking-wider uppercase shadow-sm">For Sale</span>
                            </div>
                            <div class="absolute top-3 right-3 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-red-500 flex items-center justify-center shadow-sm transition-colors border border-red-100">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="text-xl font-black text-slate-900 mb-1">Rs. 8.5 Cr</div>
                            <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="/properties/demo" class="hover:text-primary transition-colors after:absolute after:inset-0">Classic Bungalow</a></h3>
                            <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Bhaisepati, Lalitpur</p>
                            
                            <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                    <span title="Beds" class="flex items-center gap-1"><i class="fas fa-bed text-primary/70"></i> 6</span>
                                    <span title="Baths" class="flex items-center gap-1"><i class="fas fa-bath text-primary/70"></i> 4</span>
                                    <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 12 Aana</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 3 -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Apartment" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-accent text-[10px] font-black tracking-wider uppercase shadow-sm">For Rent</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="text-xl font-black text-slate-900 mb-1">Rs. 85,000<span class="text-xs text-slate-400 font-medium">/mo</span></div>
                            <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="/properties/demo" class="hover:text-primary transition-colors after:absolute after:inset-0">Luxury Apartment</a></h3>
                            <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Jhamsikhel, Lalitpur</p>
                            
                            <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                    <span title="Beds" class="flex items-center gap-1"><i class="fas fa-bed text-primary/70"></i> 2</span>
                                    <span title="Baths" class="flex items-center gap-1"><i class="fas fa-bath text-primary/70"></i> 2</span>
                                    <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 1200 sqft</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 4 -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                            <img src="https://images.unsplash.com/photo-1542314831-c6a4d14b189a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Land" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-3 py-1 bg-accent text-white backdrop-blur rounded-full text-[10px] font-black tracking-wider uppercase shadow-sm">Hot Deal</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="text-xl font-black text-slate-900 mb-1">Rs. 15 Cr</div>
                            <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="/properties/demo" class="hover:text-primary transition-colors after:absolute after:inset-0">Commercial Land</a></h3>
                            <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Tripureshwor, Kathmandu</p>
                            
                            <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                    <span title="Road" class="flex items-center gap-1"><i class="fas fa-road text-primary/70"></i> 20ft Access</span>
                                    <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 1 Ropani</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional standard cards could go here... -->

                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    <nav class="inline-flex bg-white rounded-full p-1 border border-slate-200 shadow-sm">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 hover:text-primary hover:bg-blue-50 transition-colors pointer-events-none opacity-50"><i class="fas fa-chevron-left text-sm"></i></a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white font-bold shadow-md">1</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-600 font-bold hover:bg-slate-100 transition-colors">2</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-600 font-bold hover:bg-slate-100 transition-colors">3</a>
                        <span class="w-10 h-10 flex items-center justify-center text-slate-400">...</span>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full text-slate-400 hover:text-primary hover:bg-blue-50 transition-colors"><i class="fas fa-chevron-right text-sm"></i></a>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function updatePrice(val) {
        document.getElementById('priceDisplay').innerText = `₹ 0 - ₹ ${val} Cr`;
    }

    // Optional: Mobile Filter Toggle Logic
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('mobileFilterToggle');
        const filterSidebar = document.getElementById('filterSidebar');
        
        if (toggleBtn && filterSidebar) {
            toggleBtn.addEventListener('click', () => {
                filterSidebar.classList.toggle('hidden');
                // Could animate it down here
            });
        }
    });
</script>
@endpush
