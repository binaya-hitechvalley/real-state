@extends('frontend.layouts.master')

@section('title', 'Sapphire Investment | Premium Real Estate Nepal')

@push('styles')
<style>
    .hero-swiper-container { width: 100%; height: 100vh; min-height: 700px; position: relative; }
    .hero-slide-bg { background-size: cover; background-position: center; background-repeat: no-repeat; }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 58, 138, 0.6) 50%, rgba(15, 23, 42, 0.8) 100%); }
    .glass-card { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1); }
    .text-gradient { background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    
    .blob { position: absolute; filter: blur(80px); z-index: 0; opacity: 0.5; border-radius: 50%; }
    .blob-1 { top: -10%; left: -10%; width: 400px; height: 400px; background: rgba(59, 130, 246, 0.3); }
    .blob-2 { bottom: -10%; right: -10%; width: 500px; height: 500px; background: rgba(14, 165, 233, 0.2); }

    .testimonial-swiper { width: 100%; padding: 40px 0 60px 0; }
    .swiper-pagination-bullet { background-color: #0ea5e9; opacity: 0.3; width: 10px; height: 10px; border-radius: 10px; transition: all 0.3s ease; }
    .swiper-pagination-bullet-active { opacity: 1; width: 30px; background: linear-gradient(to right, #3b82f6, #0ea5e9); }
    
    .card-zoom-image { transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .group:hover .card-zoom-image { transform: scale(1.08); }
</style>
@endpush

@section('content')

<!-- ==========================================
     HERO SECTION
     ========================================== -->
<section class="relative overflow-hidden group">
    <div class="swiper hero-swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
                <div class="hero-overlay"></div>
                <div class="container mx-auto px-4 md:px-8 h-full flex items-center relative z-10 pt-20">
                    <div class="max-w-4xl text-left">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-6 shadow-xl shadow-blue-900/20 transform hover:-translate-y-1 transition-transform">
                            <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
                            <span class="text-blue-100 font-bold text-xs tracking-[0.2em] uppercase">Premium Real Estate</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[1.1] mb-8 tracking-tighter">
                            Invest With <br />
                            <span class="text-gradient bg-gradient-to-r from-accent via-blue-200 to-white">Precision.</span>
                        </h1>
                        <p class="text-lg md:text-2xl text-blue-50/80 mb-12 max-w-2xl font-light leading-relaxed">
                            Discover high-yield properties and strategic land investments in Nepal's most promising growth corridors. Since 2008.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-5">
                            <a href="/properties" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-gradient-to-r from-primary to-accent rounded-full overflow-hidden shadow-xl shadow-blue-500/20 transition-all hover:shadow-blue-500/40 hover:scale-105">
                                <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                                <span class="relative flex items-center gap-2">Explore Projects <i class="fas fa-arrow-right text-sm"></i></span>
                            </a>
                            <a href="#about" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white glass-card rounded-full hover:bg-white/10 transition-all hover:scale-105">
                                Our Story
                            </a>
                        </div>
                    </div>
                    
                    <!-- Floating Stats Card (Desktop only) -->
                    <div class="hidden lg:flex absolute right-8 bottom-16 glass-card p-6 rounded-3xl flex-col gap-6 max-w-xs transform hover:-translate-y-2 transition-transform duration-500">
                        <div class="border-b border-white/10 pb-4">
                            <div class="text-4xl font-black text-white mb-1 tracking-tight">15+ <span class="text-accent text-2xl">Years</span></div>
                            <div class="text-blue-200 text-sm font-medium">Market Leadership</div>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-white mb-1 tracking-tight">100%</div>
                            <div class="text-blue-200 text-sm font-medium">Verified Documentation</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide hero-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1542314831-c6a4d14b189a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
                <div class="hero-overlay"></div>
                <div class="container mx-auto px-4 md:px-8 h-full flex items-center relative z-10 pt-20">
                    <div class="max-w-4xl text-left">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-6 shadow-xl shadow-blue-900/20">
                            <span class="w-2.5 h-2.5 rounded-full bg-green-400 animate-pulse"></span>
                            <span class="text-blue-100 font-bold text-xs tracking-[0.2em] uppercase">No Middlemen</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[1.1] mb-8 tracking-tighter">
                            Direct <br />
                            <span class="text-gradient bg-gradient-to-r from-accent via-blue-200 to-white">Ownership.</span>
                        </h1>
                        <p class="text-lg md:text-2xl text-blue-50/80 mb-12 max-w-2xl font-light leading-relaxed">
                            We develop, own, and offer select real estate projects offering maximum value and absolute transparency to our investors.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-5">
                            <a href="#contact" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-gradient-to-r from-primary to-accent rounded-full overflow-hidden shadow-xl shadow-blue-500/20 transition-all hover:shadow-blue-500/40 hover:scale-105">
                                <span class="relative flex items-center gap-2">Consult An Expert <i class="fas fa-headset text-sm"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="swiper-pagination !bottom-8"></div>

        <!-- Navigation Buttons -->
        <div class="swiper-button-prev !text-white !w-14 !h-14 !bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-primary hover:border-primary transition-all opacity-0 group-hover:opacity-100 hidden md:flex after:!text-xl !left-4 md:!left-8"></div>
        <div class="swiper-button-next !text-white !w-14 !h-14 !bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-primary hover:border-primary transition-all opacity-0 group-hover:opacity-100 hidden md:flex after:!text-xl !right-4 md:!right-8"></div>
    </div>
</section>

<!-- ==========================================
     EXPLORE CATEGORIES
     ========================================== -->
<section class="py-16 bg-white relative z-20 border-b border-slate-100">
    <div class="container mx-auto px-4 md:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight mb-3">
                Explore <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Categories</span>
            </h2>
            <p class="text-slate-500 font-medium">Find properties tailored to your specific needs</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <!-- Category 1 -->
            <a href="#" class="group bg-slate-50 rounded-3xl p-6 text-center shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 mx-auto rounded-full bg-white text-primary flex items-center justify-center text-2xl mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm border border-slate-100">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Residential</h3>
                <p class="text-xs text-slate-500 font-medium bg-white border border-slate-100 rounded-full px-3 py-1 inline-block mt-2">120+ Properties</p>
            </a>
            
            <!-- Category 2 -->
            <a href="#" class="group bg-slate-50 rounded-3xl p-6 text-center shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 mx-auto rounded-full bg-white text-primary flex items-center justify-center text-2xl mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm border border-slate-100">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Commercial</h3>
                <p class="text-xs text-slate-500 font-medium bg-white border border-slate-100 rounded-full px-3 py-1 inline-block mt-2">45 Properties</p>
            </a>

            <!-- Category 3 -->
            <a href="#" class="group bg-slate-50 rounded-3xl p-6 text-center shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 mx-auto rounded-full bg-white text-primary flex items-center justify-center text-2xl mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm border border-slate-100">
                    <i class="fas fa-map"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Land</h3>
                <p class="text-xs text-slate-500 font-medium bg-white border border-slate-100 rounded-full px-3 py-1 inline-block mt-2">85 Properties</p>
            </a>

            <!-- Category 4 -->
            <a href="#" class="group bg-slate-50 rounded-3xl p-6 text-center shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 mx-auto rounded-full bg-white text-primary flex items-center justify-center text-2xl mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm border border-slate-100">
                    <i class="fas fa-city"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Apartments</h3>
                <p class="text-xs text-slate-500 font-medium bg-white border border-slate-100 rounded-full px-3 py-1 inline-block mt-2">30 Properties</p>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================
     ABOUT US
     ========================================== -->
<section id="about" class="py-24 relative overflow-hidden bg-white">
    <!-- Decorative Gradients -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-slate-50 to-transparent pointer-events-none"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 relative">
            <span class="inline-block py-1.5 px-4 rounded-full bg-blue-50 text-accent font-bold text-xs tracking-widest uppercase mb-4 shadow-sm border border-blue-100">
                <i class="fas fa-building mr-2"></i> Our Identity
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 mb-6 tracking-tight">
                Building <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Trust</span> Since 2008.
            </h2>
            <p class="text-lg text-slate-600 font-medium leading-relaxed">
                We are more than a real estate agency. We are your strategic partners in navigating Nepal's dynamic property landscape. With over 15 years of market leadership, we develop and offer our own premium projects.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group relative p-8 bg-slate-50 rounded-3xl overflow-hidden hover:bg-primary transition-colors duration-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-white/40 to-transparent rounded-bl-full transform translate-x-16 -translate-y-16 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>
                <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500 relative z-10">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-white transition-colors duration-500 relative z-10">100% Secure & Verified</h3>
                <p class="text-slate-600 group-hover:text-blue-100 transition-colors duration-500 relative z-10 font-medium">
                    Every property we offer comes with strictly verified documentation, ensuring your investment is completely safe and dispute-free.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="group relative p-8 bg-slate-50 rounded-3xl overflow-hidden hover:bg-primary transition-colors duration-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-white/40 to-transparent rounded-bl-full transform translate-x-16 -translate-y-16 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>
                <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500 relative z-10">
                    <i class="fas fa-handshake-slash"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-white transition-colors duration-500 relative z-10">Zero Middlemen</h3>
                <p class="text-slate-600 group-hover:text-blue-100 transition-colors duration-500 relative z-10 font-medium">
                    We develop and own our select real estate projects. You deal directly with us, eliminating hidden fees and ensuring absolute transparency.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="group relative p-8 bg-slate-50 rounded-3xl overflow-hidden hover:bg-primary transition-colors duration-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-white/40 to-transparent rounded-bl-full transform translate-x-16 -translate-y-16 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>
                <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500 relative z-10">
                    <i class="fas fa-road"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-white transition-colors duration-500 relative z-10">Ready Infrastructure</h3>
                <p class="text-slate-600 group-hover:text-blue-100 transition-colors duration-500 relative z-10 font-medium">
                    Our plotted lands and housing projects come equipped with essential infrastructure ready for immediate development.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     PROPERTIES
     ========================================== -->
<section id="properties" class="py-24 bg-slate-50 relative overflow-hidden">
    <!-- Offset right wrapper to allow bleeding edge on right -->
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Left Info Column -->
            <div class="w-full lg:w-1/3 flex flex-col justify-center relative z-20 bg-slate-50 py-4 lg:pr-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-accent font-bold text-xs tracking-widest uppercase mb-6 border border-slate-100 self-start shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                    Showcase
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-8">
                    Explore the Featured <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Properties</span>
                </h2>
                
                <!-- Filter Tabs -->
                <div class="inline-flex bg-white rounded-full p-1 border border-slate-200 shadow-sm self-start mb-10" id="property-tabs">
                    <button class="nav-tab active px-5 py-2.5 rounded-full text-sm font-bold text-white bg-slate-900 shadow-md transition-all" data-target="all">All</button>
                    <button class="nav-tab px-5 py-2.5 rounded-full text-sm font-bold text-slate-500 hover:text-slate-900 transition-all" data-target="sell">For Sale</button>
                    <button class="nav-tab px-5 py-2.5 rounded-full text-sm font-bold text-slate-500 hover:text-slate-900 transition-all" data-target="rent">For Rent</button>
                </div>

                <!-- Custom Slider Controls -->
                <div class="flex gap-4">
                    <button class="prop-prev w-12 h-12 rounded-full border border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="prop-next w-12 h-12 rounded-full border border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Right Slider Column -->
            <div class="w-full lg:w-2/3 relative z-10 lg:-mr-[calc(50vw-50%)]"> <!-- Bleed right seamlessly -->
                <div class="swiper property-swiper pb-8 pr-[1rem]">
                    <div class="swiper-wrapper">
                        
                        <!-- Slide 1 (Sale) -->
                        <div class="swiper-slide property-card" data-category="sell" style="width: 320px;">
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
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Modern Villa in City</a></h3>
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
                        </div>

                        <!-- Slide 2 (Sale) -->
                        <div class="swiper-slide property-card" data-category="sell" style="width: 320px;">
                            <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                                <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1542314831-c6a4d14b189a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Land" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3 flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-accent text-white backdrop-blur rounded-full text-[10px] font-black tracking-wider uppercase shadow-sm">Hot Deal</span>
                                        <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-primary text-[10px] font-black tracking-wider uppercase shadow-sm">For Sale</span>
                                    </div>
                                    <div class="absolute top-3 right-3">
                                        <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-xl font-black text-slate-900 mb-1">Rs. 15 Cr</div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Commercial Land</a></h3>
                                    <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Tripureshwor, Ktm</p>
                                    
                                    <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                        <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                            <span title="Road Access" class="flex items-center gap-1"><i class="fas fa-road text-primary/70"></i> 20 ft</span>
                                            <span title="Area" class="flex items-center gap-1"><i class="fas fa-map text-primary/70"></i> 1 Ropani</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 (Rent) -->
                        <div class="swiper-slide property-card" data-category="rent" style="width: 320px;">
                            <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                                <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Apartment" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3 flex gap-2">
                                        <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-accent text-[10px] font-black tracking-wider uppercase shadow-sm">For Rent</span>
                                    </div>
                                    <div class="absolute top-3 right-3">
                                        <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="px-2.5 py-1 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold rounded-full"><i class="fas fa-camera mr-1"></i> 8</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-xl font-black text-slate-900 mb-1">Rs. 85,000<span class="text-xs text-slate-400 font-medium">/mo</span></div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Luxury Apartment</a></h3>
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
                        </div>

                        <!-- Slide 4 (Rent) -->
                        <div class="swiper-slide property-card" data-category="rent" style="width: 320px;">
                            <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                                <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Office" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
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
                                    <div class="text-xl font-black text-slate-900 mb-1">Rs. 1.2 L<span class="text-xs text-slate-400 font-medium">/mo</span></div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Premium Office Space</a></h3>
                                    <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Naxal, Kathmandu</p>
                                    
                                    <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                        <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                            <span title="Rooms" class="flex items-center gap-1"><i class="fas fa-door-open text-primary/70"></i> 4</span>
                                            <span title="Baths" class="flex items-center gap-1"><i class="fas fa-bath text-primary/70"></i> 2</span>
                                            <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 2500 sqft</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5 (Sale) -->
                        <div class="swiper-slide property-card" data-category="sell" style="width: 320px;">
                            <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                                <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Bungalow" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
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
                                        <span class="px-2.5 py-1 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold rounded-full"><i class="fas fa-camera mr-1"></i> 12</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-xl font-black text-slate-900 mb-1">Rs. 8.5 Cr</div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Classic Bungalow</a></h3>
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
                        </div>

                        <!-- Slide 6 (Rent) -->
                        <div class="swiper-slide property-card" data-category="rent" style="width: 320px;">
                            <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-300">
                                <div class="relative h-56 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Penthouse" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3 flex gap-2">
                                        <span class="px-3 py-1 bg-accent text-white backdrop-blur rounded-full text-[10px] font-black tracking-wider uppercase shadow-sm">Premium</span>
                                        <span class="px-3 py-1 bg-white/95 backdrop-blur rounded-full text-accent text-[10px] font-black tracking-wider uppercase shadow-sm">For Rent</span>
                                    </div>
                                    <div class="absolute top-3 right-3">
                                        <button class="w-8 h-8 bg-white/95 backdrop-blur rounded-full text-slate-400 hover:text-red-500 flex items-center justify-center shadow-sm transition-colors">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="px-2.5 py-1 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold rounded-full"><i class="fas fa-camera mr-1"></i> 15</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="text-xl font-black text-slate-900 mb-1">Rs. 2.5 L<span class="text-xs text-slate-400 font-medium">/mo</span></div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1 truncate"><a href="#" class="hover:text-primary transition-colors">Skyline Penthouse</a></h3>
                                    <p class="text-slate-500 text-xs font-medium mb-4 truncate"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Sanepa, Lalitpur</p>
                                    
                                    <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                                        <div class="flex items-center gap-3 text-[11px] font-bold text-slate-600">
                                            <span title="Beds" class="flex items-center gap-1"><i class="fas fa-bed text-primary/70"></i> 3</span>
                                            <span title="Baths" class="flex items-center gap-1"><i class="fas fa-bath text-primary/70"></i> 4</span>
                                            <span title="Area" class="flex items-center gap-1"><i class="fas fa-vector-square text-primary/70"></i> 3200 sqft</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- ==========================================
     MARKET INSIGHTS (BLOGS)
     ========================================== -->
<section id="blog" class="py-24 bg-white relative overflow-hidden">
    <!-- Offset right wrapper to allow bleeding edge on right -->
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Left Info Column -->
            <div class="w-full lg:w-1/3 flex flex-col justify-center relative z-20 bg-white py-4 lg:pr-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-primary font-bold text-xs tracking-widest uppercase mb-6 self-start shadow-sm">
                    <i class="fas fa-newspaper"></i> Knowledge Hub
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-8">
                    Latest <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Insights</span>
                </h2>
                <p class="text-slate-500 font-medium mb-10 mr-4">
                    Stay updated with the latest trends, tips, and legal advice in the real estate market of Nepal.
                </p>

                <!-- Custom Slider Controls -->
                <div class="flex gap-4">
                    <button class="blog-prev w-12 h-12 rounded-full border border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="blog-next w-12 h-12 rounded-full border border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Right Slider Column -->
            <div class="w-full lg:w-2/3 relative z-10 lg:-mr-[calc(50vw-50%)]"> <!-- Bleed right trick -->
                <div class="swiper blog-swiper pb-8 pr-[1rem]">
                    <div class="swiper-wrapper">
                        
                        <!-- Blog Slide 1 -->
                        <div class="swiper-slide" style="width: 320px;">
                            <article class="group bg-slate-50 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                                <div class="relative h-48 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Blog" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-sm">
                                        <span class="block text-primary font-black text-base leading-none">15</span>
                                        <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mt-0.5">Oct</span>
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">
                                        <span class="flex items-center gap-1"><i class="fas fa-folder text-accent"></i> Invest</span>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors leading-snug truncate">
                                        <a href="#">Why Ktm Valley is Secure</a>
                                    </h3>
                                    <p class="text-slate-500 text-xs mb-4 line-clamp-2 font-medium flex-grow">
                                        Exploring the factors driving property values in the capital and long-term hold strategies.
                                    </p>
                                    <a href="#" class="inline-flex items-center gap-1.5 text-primary font-bold text-xs tracking-wide uppercase group/link mt-auto">
                                        Read <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <!-- Blog Slide 2 -->
                        <div class="swiper-slide" style="width: 320px;">
                            <article class="group bg-slate-50 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                                <div class="relative h-48 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Blog" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-sm">
                                        <span class="block text-primary font-black text-base leading-none">02</span>
                                        <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mt-0.5">Oct</span>
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">
                                        <span class="flex items-center gap-1"><i class="fas fa-folder text-accent"></i> Legal</span>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors leading-snug truncate">
                                        <a href="#">Aana Vs. Square Feet Guide</a>
                                    </h3>
                                    <p class="text-slate-500 text-xs mb-4 line-clamp-2 font-medium flex-grow">
                                        A comprehensive guide for non-resident Nepalis explaining local measurement units.
                                    </p>
                                    <a href="#" class="inline-flex items-center gap-1.5 text-primary font-bold text-xs tracking-wide uppercase group/link mt-auto">
                                        Read <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <!-- Blog Slide 3 -->
                        <div class="swiper-slide" style="width: 320px;">
                            <article class="group bg-slate-50 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                                <div class="relative h-48 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1516156008625-3a9d045f6211?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Blog" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-sm">
                                        <span class="block text-primary font-black text-base leading-none">28</span>
                                        <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mt-0.5">Sep</span>
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">
                                        <span class="flex items-center gap-1"><i class="fas fa-folder text-accent"></i> Tips</span>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors leading-snug truncate">
                                        <a href="#">5 Suburb Plotted Land Checks</a>
                                    </h3>
                                    <p class="text-slate-500 text-xs mb-4 line-clamp-2 font-medium flex-grow">
                                        Learn how to verify road access, drainage, and utilities before signing the deed.
                                    </p>
                                    <a href="#" class="inline-flex items-center gap-1.5 text-primary font-bold text-xs tracking-wide uppercase group/link mt-auto">
                                        Read <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <!-- Blog Slide 4 -->
                        <div class="swiper-slide" style="width: 320px;">
                            <article class="group bg-slate-50 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                                <div class="relative h-48 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Blog" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-sm">
                                        <span class="block text-primary font-black text-base leading-none">12</span>
                                        <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mt-0.5">Aug</span>
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">
                                        <span class="flex items-center gap-1"><i class="fas fa-folder text-accent"></i> Commercial</span>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors leading-snug truncate">
                                        <a href="#">Rise of Co-Working Spaces</a>
                                    </h3>
                                    <p class="text-slate-500 text-xs mb-4 line-clamp-2 font-medium flex-grow">
                                        How the post-pandemic landscape is shaping commercial real estate demands in Nepal.
                                    </p>
                                    <a href="#" class="inline-flex items-center gap-1.5 text-primary font-bold text-xs tracking-wide uppercase group/link mt-auto">
                                        Read <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <!-- Blog Slide 5 -->
                        <div class="swiper-slide" style="width: 320px;">
                            <article class="group bg-slate-50 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                                <div class="relative h-48 overflow-hidden m-2 rounded-[1.5rem]">
                                    <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Blog" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-sm">
                                        <span class="block text-primary font-black text-base leading-none">05</span>
                                        <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mt-0.5">Jun</span>
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">
                                        <span class="flex items-center gap-1"><i class="fas fa-folder text-accent"></i> Design</span>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors leading-snug truncate">
                                        <a href="#">Modernizing Neo-Classic Homes</a>
                                    </h3>
                                    <p class="text-slate-500 text-xs mb-4 line-clamp-2 font-medium flex-grow">
                                        Tips on renovating older Kathmandu homes while preserving their classic architectural charm.
                                    </p>
                                    <a href="#" class="inline-flex items-center gap-1.5 text-primary font-bold text-xs tracking-wide uppercase group/link mt-auto">
                                        Read <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     STATS BANNER
     ========================================== -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="bg-gray-50 rounded-2xl py-10 px-8 flex flex-col md:flex-row justify-center items-center gap-12 md:gap-24 text-center border border-gray-100">
            <!-- Stat 1 -->
            <div>
                <div class="text-4xl md:text-5xl font-bold text-emerald-500 mb-2">5,635</div>
                <div class="text-xs font-semibold text-gray-500 tracking-wider uppercase">Houses For Sale</div>
            </div>
            <!-- Stat 2 -->
            <div>
                <div class="text-4xl md:text-5xl font-bold text-emerald-500 mb-2">324</div>
                <div class="text-xs font-semibold text-gray-500 tracking-wider uppercase">Open Houses</div>
            </div>
            <!-- Stat 3 -->
            <div>
                <div class="text-4xl md:text-5xl font-bold text-emerald-500 mb-2">105</div>
                <div class="text-xs font-semibold text-gray-500 tracking-wider uppercase">Houses Recently Sold</div>
            </div>
            <!-- Stat 4 -->
            <div>
                <div class="text-4xl md:text-5xl font-bold text-emerald-500 mb-2">301</div>
                <div class="text-xs font-semibold text-gray-500 tracking-wider uppercase">Price Reduced</div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     TESTIMONIALS
     ========================================== -->
<section class="py-24 relative overflow-hidden bg-slate-900 border-t border-white/5">
    <div class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary/20 via-slate-900 to-slate-900 pointer-events-none"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            
            <div class="w-full lg:w-5/12 text-left">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 text-accent font-bold text-xs tracking-widest uppercase mb-6 border border-white/10 shadow-lg">
                    <i class="fas fa-star text-yellow-500"></i> Trust Endorsed
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Client <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-blue-300">Experiences.</span>
                </h2>
                <p class="text-lg text-slate-400 font-medium leading-relaxed mb-10 mr-0 lg:mr-10">
                    We don't just sell properties; we build lasting relationships based on trust, transparency, and outstanding results. Hear directly from those who have secured their future with us.
                </p>
                <div class="flex gap-4">
                    <div class="swiper-test-prev w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-slate-900 cursor-pointer transition-all">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="swiper-test-next w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-slate-900 cursor-pointer transition-all">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-7/12">
                <div class="swiper testimonial-swiper pb-12 overflow-hidden">
                    <div class="swiper-wrapper">
                        <!-- T1 -->
                        <div class="swiper-slide h-auto">
                            <div class="p-8 md:p-10 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl h-full flex flex-col relative group hover:bg-white/10 transition-colors duration-300">
                                <i class="fas fa-quote-right text-6xl text-white/5 absolute top-6 right-6 pointer-events-none transform -scale-x-100 group-hover:text-accent/10 transition-colors"></i>
                                <div class="flex gap-1 text-yellow-400 text-sm mb-6">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <p class="text-lg md:text-xl text-slate-300 font-medium leading-relaxed mb-8 flex-grow">
                                    "The level of professionalism at Sapphire is unmatched. They found us commercial land in Kathmandu perfectly suited for our warehouse expansion. The transparency in dealing was <span class="text-white font-bold">refreshing</span>."
                                </p>
                                <div class="flex items-center gap-4 pt-6 border-t border-white/10">
                                    <div class="relative w-14 h-14 rounded-full p-1 bg-gradient-to-br from-primary to-accent">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full rounded-full object-cover">
                                    </div>
                                    <div class="text-left">
                                        <h4 class="font-bold text-white tracking-wide">Rajesh Shrestha</h4>
                                        <span class="text-sm font-medium text-accent">Corporate Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- T2 -->
                        <div class="swiper-slide h-auto">
                            <div class="p-8 md:p-10 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl h-full flex flex-col relative group hover:bg-white/10 transition-colors duration-300">
                                <i class="fas fa-quote-right text-6xl text-white/5 absolute top-6 right-6 pointer-events-none transform -scale-x-100 group-hover:text-accent/10 transition-colors"></i>
                                <div class="flex gap-1 text-yellow-400 text-sm mb-6">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <p class="text-lg md:text-xl text-slate-300 font-medium leading-relaxed mb-8 flex-grow">
                                    "As an NRN, I was worried about investing in property back home. Sapphire Investment made the process transparent and easy, with regular updates and all documents <span class="text-white font-bold">verified properly</span>."
                                </p>
                                <div class="flex items-center gap-4 pt-6 border-t border-white/10">
                                    <div class="relative w-14 h-14 rounded-full p-1 bg-gradient-to-br from-primary to-accent">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full rounded-full object-cover">
                                    </div>
                                    <div class="text-left">
                                        <h4 class="font-bold text-white tracking-wide">Sita Sharma</h4>
                                        <span class="text-sm font-medium text-accent">NRN Investor</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- T3 -->
                        <div class="swiper-slide h-auto">
                            <div class="p-8 md:p-10 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl h-full flex flex-col relative group hover:bg-white/10 transition-colors duration-300">
                                <i class="fas fa-quote-right text-6xl text-white/5 absolute top-6 right-6 pointer-events-none transform -scale-x-100 group-hover:text-accent/10 transition-colors"></i>
                                <div class="flex gap-1 text-yellow-400 text-sm mb-6">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                </div>
                                <p class="text-lg md:text-xl text-slate-300 font-medium leading-relaxed mb-8 flex-grow">
                                    "The team understood exactly what I was looking for and showed me multiple options within my budget. I found my <span class="text-white font-bold">dream home</span> within 2 weeks of working with them!"
                                </p>
                                <div class="flex items-center gap-4 pt-6 border-t border-white/10">
                                    <div class="relative w-14 h-14 rounded-full p-1 bg-gradient-to-br from-primary to-accent">
                                        <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="Client" class="w-full h-full rounded-full object-cover">
                                    </div>
                                    <div class="text-left">
                                        <h4 class="font-bold text-white tracking-wide">Prakash K.C.</h4>
                                        <span class="text-sm font-medium text-accent">Home Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     FAQ SECTION
     ========================================== -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4 md:px-8 max-w-4xl">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-primary font-bold text-xs tracking-widest uppercase mb-4 self-start shadow-sm">
                <i class="fas fa-question-circle"></i> Got Questions?
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-6">
                Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Questions</span>
            </h2>
            <p class="text-slate-500 font-medium">Everything you need to know about buying, selling, or renting with us.</p>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="faq-item border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                <button class="faq-toggle w-full flex items-center justify-between p-6 bg-white hover:bg-slate-50 transition-colors text-left focus:outline-none">
                    <h3 class="font-bold text-slate-900 text-lg">How do I verify the legal documents of a property?</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 transition-transform duration-300 icon-wrapper">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>
                <div class="faq-content hidden px-6 pb-6 text-slate-600 font-medium leading-relaxed border-t border-slate-100 pt-4">
                    Our team conducts a thorough 5-point verification check for every property we list. This includes checking the Lalpurja (Land Ownership Certificate), Blueprint, trace map, tax clearance, and citizenship of the owner. We also facilitate meetings with legal experts to give you complete peace of mind.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                <button class="faq-toggle w-full flex items-center justify-between p-6 bg-white hover:bg-slate-50 transition-colors text-left focus:outline-none">
                    <h3 class="font-bold text-slate-900 text-lg">What are your commission rates?</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 transition-transform duration-300 icon-wrapper">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>
                <div class="faq-content hidden px-6 pb-6 text-slate-600 font-medium leading-relaxed border-t border-slate-100 pt-4">
                    For our owned projects, there is absolutely zero commission or middleman fee. You buy direct from the developer. For brokered listings, our standard agency fee is transparently communicated upfront before any transaction begins, strictly abiding by Nepal's real estate associations' guidelines.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                <button class="faq-toggle w-full flex items-center justify-between p-6 bg-white hover:bg-slate-50 transition-colors text-left focus:outline-none">
                    <h3 class="font-bold text-slate-900 text-lg">Can Non-Resident Nepalese (NRNs) buy property here?</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 transition-transform duration-300 icon-wrapper">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>
                <div class="faq-content hidden px-6 pb-6 text-slate-600 font-medium leading-relaxed border-t border-slate-100 pt-4">
                    Yes, NRNs can easily invest in real estate in Nepal. The new NRN act allows NRN cardholders to purchase limited residential land or apartments. Our legal team will guide you step-by-step through the updated banking, repatriation, and registration processes specialized for expatriates.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">
                <button class="faq-toggle w-full flex items-center justify-between p-6 bg-white hover:bg-slate-50 transition-colors text-left focus:outline-none">
                    <h3 class="font-bold text-slate-900 text-lg">Do you help with home loans and financing?</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 transition-transform duration-300 icon-wrapper">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>
                <div class="faq-content hidden px-6 pb-6 text-slate-600 font-medium leading-relaxed border-t border-slate-100 pt-4">
                    Absolutely! We have partnered with Nepal's leading Class-A commercial banks. Once you finalize a property, we assist in fast-tracking your home loan appraisal and approval process, often securing preferred interest rates for our clients due to our strong banking relationships.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     CALL TO ACTION (CTA)
     ========================================== -->
<section class="py-20 relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 border-t border-white/10">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] opacity-5 bg-cover bg-center mix-blend-overlay"></div>
    <div class="container mx-auto px-4 md:px-8 relative z-10 text-center">
        <h2 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight">
            Ready to Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-blue-200">Dream Property?</span>
        </h2>
        <p class="text-xl text-blue-100 font-light max-w-2xl mx-auto mb-10">
            Let's turn your real estate goals into reality. Whether you're buying, selling, or looking for premium rentals, we have you covered.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-gradient-to-r from-primary to-accent rounded-full shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1">
                Browse Properties
            </a>
            <a href="#" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all hover:-translate-y-1">
                <i class="fas fa-phone-alt mr-2"></i> Contact an Expert
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.hero-swiper-container', {
            loop: true, effect: 'fade', fadeEffect: { crossFade: true },
            speed: 1000, autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });

        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            loop: true, slidesPerView: 1, spaceBetween: 30,
            autoplay: { delay: 6000, disableOnInteraction: false },
            navigation: { nextEl: '.swiper-test-next', prevEl: '.swiper-test-prev' }
        });

        // Initialize Property Slider
        const propSwiper = new Swiper('.property-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 24,
            navigation: {
                nextEl: '.prop-next',
                prevEl: '.prop-prev',
            },
            observer: true, 
            observeParents: true
        });

        // Initialize Blog Slider
        const blogSlider = new Swiper('.blog-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 24,
            navigation: {
                nextEl: '.blog-next',
                prevEl: '.blog-prev',
            }
        });

        // Property Tabs Navigation
        const tabs = document.querySelectorAll('.nav-tab');
        const cards = document.querySelectorAll('.property-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Update active tab styling
                tabs.forEach(t => {
                    t.classList.remove('bg-slate-900', 'text-white', 'shadow-md');
                    t.classList.add('text-slate-500');
                });
                tab.classList.remove('text-slate-500');
                tab.classList.add('bg-slate-900', 'text-white', 'shadow-md');

                // Filter logic
                const target = tab.getAttribute('data-target');

                cards.forEach(card => {
                    if (target === 'all' || card.getAttribute('data-category') === target) {
                        card.classList.remove('hidden');
                        card.classList.add('swiper-slide'); // Re-add class for swiper recognition
                    } else {
                        card.classList.add('hidden');
                        card.classList.remove('swiper-slide'); // Remove class so swiper ignores it
                    }
                });

                // Crucial: Update the swiper instance so it recalculates spacing without empty gaps!
                propSwiper.update();
                propSwiper.slideTo(0);
            });
        });

        // FAQ Accordion Logic
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('i');
                const iconWrapper = toggle.querySelector('.icon-wrapper');
                const parent = toggle.closest('.faq-item');
                
                // Close all other open FAQs
                faqToggles.forEach(otherToggle => {
                    if (otherToggle !== toggle) {
                        otherToggle.nextElementSibling.classList.add('hidden');
                        otherToggle.querySelector('i').classList.remove('fa-minus');
                        otherToggle.querySelector('i').classList.add('fa-plus');
                        otherToggle.querySelector('.icon-wrapper').classList.remove('bg-primary', 'text-white', 'rotate-180');
                        otherToggle.querySelector('.icon-wrapper').classList.add('bg-blue-50', 'text-primary');
                        otherToggle.closest('.faq-item').classList.remove('border-primary/50', 'shadow-md');
                    }
                });

                // Toggle Current FAQ
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    iconWrapper.classList.remove('bg-blue-50', 'text-primary');
                    iconWrapper.classList.add('bg-primary', 'text-white', 'rotate-180');
                    parent.classList.add('border-primary/50', 'shadow-md');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    iconWrapper.classList.remove('bg-primary', 'text-white', 'rotate-180');
                    iconWrapper.classList.add('bg-blue-50', 'text-primary');
                    parent.classList.remove('border-primary/50', 'shadow-md');
                }
            });
        });
    });
</script>
@endpush
