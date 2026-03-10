@extends('frontend.layouts.master')

@section('title', 'Property Details | Sapphire Investment')

@push('styles')
<style>
    .gallery-swiper { width: 100%; height: 60vh; min-height: 400px; border-radius: 1.5rem; overflow: hidden; }
    .thumb-swiper { height: 120px; box-sizing: border-box; padding: 10px 0; }
    .thumb-swiper .swiper-slide { width: 25%; opacity: 0.5; border-radius: 1rem; overflow: hidden; cursor: pointer; transition: opacity 0.3s ease; }
    .thumb-swiper .swiper-slide-thumb-active { opacity: 1; border: 2px solid #0ea5e9; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<!-- Flatpickr for Date Selection -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .form-input { width: 100%; border-radius: 0.75rem; border: 1px solid #e2e8f0; padding: 0.75rem 1rem; background-color: #f8fafc; transition: all 0.2s ease; outline: none; font-weight: 500; font-size: 0.875rem;}
    .form-input:focus { border-color: #3b82f6; background-color: white; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
    
    .filter-checkbox {
        appearance: none; background-color: #fff; margin: 0; font: inherit;
        color: currentColor; width: 1.15em; height: 1.15em; border: 2px solid #cbd5e1;
        border-radius: 0.25em; display: grid; place-content: center; transition: 0.2s all; cursor: pointer;
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
     PAGE HEADER
     ========================================== -->
<section class="pt-32 pb-12 bg-slate-50 border-b border-slate-200">
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div>
                <div class="inline-flex gap-2 mb-4">
                    <span class="px-3 py-1 bg-white border border-slate-200 rounded-full text-slate-500 text-[10px] font-bold uppercase tracking-wider shadow-sm">For Sale</span>
                    <span class="px-3 py-1 bg-accent text-white rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm">Premium</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-2">Modern Classic Bungalow</h1>
                <p class="text-slate-500 font-medium flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-primary"></i> Bhaisepati, Lalitpur, Nepal
                </p>
            </div>
            <div class="text-left md:text-right">
                <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mb-1">Starting Price</p>
                <div class="text-4xl font-black text-emerald-500">Rs. 8.5 <span class="text-2xl text-emerald-600/80">Cr</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     PROPERTY CONTENT
     ========================================== -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Left Column: Details -->
            <div class="w-full lg:w-2/3">
                
                <!-- Gallery Section -->
                <div class="mb-12">
                    <!-- Main Image Slider -->
                    <div class="swiper gallery-swiper mb-4 shadow-xl">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide cursor-pointer" onclick="openLightbox(0)">
                                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover" alt="Main View">
                            </div>
                            <div class="swiper-slide cursor-pointer" onclick="openLightbox(1)">
                                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover" alt="Living Room">
                            </div>
                            <div class="swiper-slide cursor-pointer" onclick="openLightbox(2)">
                                <img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover" alt="Kitchen">
                            </div>
                            <div class="swiper-slide cursor-pointer" onclick="openLightbox(3)">
                                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover" alt="Bedroom">
                            </div>
                        </div>
                        <div class="swiper-button-next !text-white !bg-slate-900/50 hover:!bg-primary rounded-full !w-12 !h-12 flex items-center justify-center transition-colors after:!text-sm backdrop-blur"></div>
                        <div class="swiper-button-prev !text-white !bg-slate-900/50 hover:!bg-primary rounded-full !w-12 !h-12 flex items-center justify-center transition-colors after:!text-sm backdrop-blur"></div>
                    </div>
                    
                    <!-- Thumbnail Slider -->
                    <div class="swiper thumb-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover"></div>
                            <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover"></div>
                            <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover"></div>
                            <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover"></div>
                        </div>
                    </div>
                </div>

                <!-- Key Highlights Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                    <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center text-center">
                        <i class="fas fa-bed text-2xl text-primary mb-2"></i>
                        <div class="text-sm font-bold text-slate-800">5 Bedrooms</div>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center text-center">
                        <i class="fas fa-bath text-2xl text-primary mb-2"></i>
                        <div class="text-sm font-bold text-slate-800">4 Bathrooms</div>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center text-center">
                        <i class="fas fa-vector-square text-2xl text-primary mb-2"></i>
                        <div class="text-sm font-bold text-slate-800">12 Aana Area</div>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center text-center">
                        <i class="fas fa-car text-2xl text-primary mb-2"></i>
                        <div class="text-sm font-bold text-slate-800">3 Parking Slots</div>
                    </div>
                </div>

                <!-- Property Overview -->
                <div class="mb-12">
                    <h3 class="text-2xl font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Property Overview</h3>
                    <div class="prose prose-slate max-w-none text-slate-600 font-medium leading-relaxed">
                        <p>
                            Experience unparalleled luxury in this modern classic bungalow situated in the highly sought-after neighborhood of Bhaisepati, Lalitpur. This exquisite property spans across a generous 12 Aana plot and offers a perfect blend of contemporary design and timeless elegance.
                        </p>
                        <p>
                            The ground floor welcomes you with a grand foyer leading to a spacious, light-filled living area with large floor-to-ceiling windows. The ultra-modern, fully equipped modular kitchen with a contiguous dining area makes it ideal for entertaining guests. 
                        </p>
                        <p>
                            The upper levels host 5 luxuriously appointed bedrooms, including a master suite complete with a walk-in closet, enormous en-suite bathroom, and a private balcony offering stunning panoramic views of the Kathmandu valley and surrounding hills.
                        </p>
                    </div>
                </div>

                <!-- Key Features & Amenities -->
                <div class="mb-12">
                    <h3 class="text-2xl font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Features & Amenities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">Modular Kitchen setup</span></div>
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">Servant Quarters</span></div>
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">Backup Generator / Solar Install</span></div>
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">24/7 Security System Configured</span></div>
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">Landscaped Garden with Gazebo</span></div>
                        <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-3 border border-slate-100"><i class="fas fa-check-circle text-accent"></i> <span class="text-slate-700 font-medium text-sm">Pitched 20ft Road Access</span></div>
                    </div>
                </div>

                <!-- Location Map -->
                <div>
                    <h3 class="text-2xl font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Location Map</h3>
                    <div class="w-full h-80 bg-slate-200 rounded-2xl overflow-hidden border border-slate-200 relative z-0" id="propertyMap">
                        <!-- Map gets rendered here -->
                    </div>
                </div>

            </div>

            <!-- Right Column: Quick CTA / Sidebar -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-28 space-y-6">
                    
                    <!-- Main CTA Card with Form -->
                    <div class="bg-white border-2 border-slate-100 rounded-[2rem] p-6 shadow-xl shadow-blue-900/5">
                        <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-100">
                            <div>
                                <span class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Status</span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 font-bold text-xs rounded-full border border-green-200">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Available
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Price</span>
                                <span class="font-black text-2xl text-slate-900">Rs. 8.5 Cr</span>
                            </div>
                        </div>

                        <!-- Integrated Contact/Booking Form -->
                        <form action="/bookings/success" method="GET" class="space-y-4">
                            <div>
                                <h3 class="font-bold text-slate-900 text-lg mb-4">Request Details</h3>
                            </div>
                            
                            <!-- Personal Details -->
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Full Name *</label>
                                <input type="text" name="name" placeholder="John Doe" class="form-input" required>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Email</label>
                                    <input type="email" name="email" placeholder="john@email.com" class="form-input">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Phone *</label>
                                    <input type="tel" name="phone" placeholder="+977 98..." class="form-input" required>
                                </div>
                            </div>
                            
                            <!-- Optional Site Visit Toggle -->
                            <div class="pt-2 border-t border-slate-100 mt-4">
                                <label class="flex items-center gap-3 cursor-pointer group p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-200 transition-colors">
                                    <input type="checkbox" id="scheduleVisitCb" class="filter-checkbox">
                                    <span class="text-sm font-bold text-slate-700 group-hover:text-primary transition-colors flex-1">Schedule a Site Visit</span>
                                    <i class="far fa-calendar-alt text-slate-400"></i>
                                </label>
                            </div>

                            <!-- Conditional Date/Time fields Container -->
                            <div id="visitSchedulerContainer" class="hidden overflow-hidden transition-all duration-300 space-y-3 bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                                <div>
                                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1 mt-1">Visit Date *</label>
                                    <div class="relative">
                                        <i class="far fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                                        <input type="text" id="visit_date" name="visit_date" placeholder="Select Date" class="form-input pl-9 bg-white" disabled required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1">Time Slot *</label>
                                    <div class="relative">
                                        <i class="far fa-clock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                                        <select id="visit_time" name="visit_time" class="form-input pl-9 appearance-none cursor-pointer bg-white" disabled required>
                                            <option value="" disabled selected>Select Time</option>
                                            <option value="morning">Morning (10 AM - 12 PM)</option>
                                            <option value="afternoon">Afternoon (1 PM - 3 PM)</option>
                                            <option value="evening">Late (3 PM - 5 PM)</option>
                                        </select>
                                        <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 mt-4 bg-gradient-to-r from-primary to-accent text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-0.5 flex justify-center items-center gap-2">
                                Send Request <i class="fas fa-paper-plane text-sm"></i>
                            </button>
                        </form>

                        <div class="mt-6 pt-5 border-t border-slate-100">
                            <p class="text-[11px] font-bold text-slate-400 mb-3 text-center uppercase tracking-widest">Or Contact Directly</p>
                            <div class="flex justify-center gap-2">
                                <a href="https://wa.me/977980000" target="_blank" class="flex-1 py-3 bg-green-50 text-green-600 hover:bg-green-500 hover:text-white font-bold rounded-xl transition-colors text-sm border border-green-200 flex justify-center items-center gap-2 shadow-sm">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>
                                <a href="tel:98000000" class="flex-1 py-3 bg-blue-50 text-primary hover:bg-primary hover:text-white font-bold rounded-xl transition-colors text-sm border border-blue-200 flex justify-center items-center gap-2 shadow-sm">
                                    <i class="fas fa-phone-alt"></i> Call Us
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center flex-shrink-0 shadow-sm"><i class="fas fa-shield-alt"></i></div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm mb-1">100% Verified Property</h4>
                                <p class="text-xs text-slate-600 font-medium leading-relaxed">All legal documents and titles have been successfully cleared by our in-house legal team.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Related Properties section could go here -->

@endsection

@push('scripts')
<!-- Lightbox (Fancybox or similar could go here, omitting for simplicity, using vanilla) -->

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Leaflet JS for Map -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (Gallery & Map code remains identical)
        const thumbSwiper = new Swiper('.thumb-swiper', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        
        const gallerySwiper = new Swiper('.gallery-swiper', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: thumbSwiper
            }
        });

        // Initialize Map
        const map = L.map('propertyMap', { zoomControl: false }).setView([27.6441, 85.3090], 14);
        L.control.zoom({ position: 'bottomright' }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
            maxZoom: 20
        }).addTo(map);

        const customIcon = L.divIcon({
            className: 'custom-pin',
            html: `<div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center shadow-xl border-2 border-white"><i class="fas fa-home"></i></div>`,
            iconSize: [40, 40],
            iconAnchor: [20, 20]
        });

        L.marker([27.6441, 85.3090], {icon: customIcon}).addTo(map)
            .bindPopup('<b class="font-bold text-slate-900">Modern Classic Bungalow</b><br><span class="text-slate-500 text-xs text-medium">Bhaisepati, Lalitpur</span>')
            .openPopup();
            
        // ----- Schedule Visit Form Logic -----
        const toggleCb = document.getElementById('scheduleVisitCb');
        const schedulerContainer = document.getElementById('visitSchedulerContainer');
        const dateInput = document.getElementById('visit_date');
        const timeSelect = document.getElementById('visit_time');
        
        // Init flatpickr
        const fp = flatpickr("#visit_date", {
            minDate: "today",
            disable: [function(date) { return (date.getDay() === 6); }], // disable Saturdays
            dateFormat: "Y-m-d",
        });

        toggleCb.addEventListener('change', function() {
            if(this.checked) {
                schedulerContainer.classList.remove('hidden');
                // minor delay to allow display flex to apply before opacity transition if we added one
                
                // Enable required fields
                dateInput.removeAttribute('disabled');
                timeSelect.removeAttribute('disabled');
            } else {
                schedulerContainer.classList.add('hidden');
                
                // Disable fields so form doesn't complain about hidden required fields
                dateInput.setAttribute('disabled', 'disabled');
                timeSelect.setAttribute('disabled', 'disabled');
            }
        });
    });

    // Simple Lightbox function stub
    function openLightbox(index) {
        console.log("Open image at index: ", index);
    }
</script>
@endpush
