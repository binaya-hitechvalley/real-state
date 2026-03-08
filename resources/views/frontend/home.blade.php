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
<section class="relative overflow-hidden">
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
                            <a href="#properties" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-gradient-to-r from-primary to-accent rounded-full overflow-hidden shadow-xl shadow-blue-500/20 transition-all hover:shadow-blue-500/40 hover:scale-105">
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
<section id="properties" class="py-24 bg-white relative">
    <div class="container mx-auto px-4 md:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-accent font-bold text-xs tracking-widest uppercase mb-4">
                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                    Portfolio
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Exclusive <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Listings</span>
                </h2>
            </div>
            <div class="hidden md:flex gap-3">
                <button class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-primary transition-all shadow-sm">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-primary transition-all shadow-sm">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Property Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Card 1 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                <div class="relative h-72 overflow-hidden m-2 rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Villa" class="w-full h-full object-cover card-zoom-image">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur text-primary text-xs font-black tracking-wider uppercase rounded-full shadow-sm">For Sale</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
                        <div class="text-white">
                            <h3 class="text-2xl font-bold mb-1 shadow-sm">Modern Villa</h3>
                            <p class="text-white/80 text-sm font-medium"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Boudha, Kathmandu</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-3xl font-black text-slate-900 mb-6">Rs. 4.5 Cr</div>
                        
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-bed text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">4 Beds</span>
                            </div>
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-bath text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">3 Baths</span>
                            </div>
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-vector-square text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">6 Aana</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center py-3.5 rounded-xl font-bold text-sm bg-slate-900 text-white hover:bg-primary transition-colors shadow-md">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                <div class="relative h-72 overflow-hidden m-2 rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1542314831-c6a4d14b189a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Land" class="w-full h-full object-cover card-zoom-image">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-accent/90 backdrop-blur text-white text-xs font-black tracking-wider uppercase rounded-full shadow-sm">Hot Deal</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
                        <div class="text-white">
                            <h3 class="text-2xl font-bold mb-1 shadow-sm">Commercial Land</h3>
                            <p class="text-white/80 text-sm font-medium"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Tripureshwor, Ktm</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-3xl font-black text-slate-900 mb-6">Rs. 15 Cr</div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl gap-1.5">
                                <div class="flex items-center gap-2"><i class="fas fa-road text-primary"></i> <span class="font-bold text-slate-800">20 ft</span></div>
                                <span class="text-[10px] font-bold text-slate-500 uppercase">Road Access</span>
                            </div>
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl gap-1.5">
                                <div class="flex items-center gap-2"><i class="fas fa-map text-primary"></i> <span class="font-bold text-slate-800">1 Ropani</span></div>
                                <span class="text-[10px] font-bold text-slate-500 uppercase">Total Area</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center py-3.5 rounded-xl font-bold text-sm bg-slate-900 text-white hover:bg-primary transition-colors shadow-md">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 border border-slate-100 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                <div class="relative h-72 overflow-hidden m-2 rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Newari" class="w-full h-full object-cover card-zoom-image">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur text-primary text-xs font-black tracking-wider uppercase rounded-full shadow-sm">For Sale</span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
                        <div class="text-white">
                            <h3 class="text-2xl font-bold mb-1 shadow-sm">Restored Home</h3>
                            <p class="text-white/80 text-sm font-medium"><i class="fas fa-map-marker-alt text-accent mr-1"></i> Patan, Lalitpur</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-3xl font-black text-slate-900 mb-6">Rs. 3.2 Cr</div>
                        
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-bed text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">5 Beds</span>
                            </div>
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-bath text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">2 Baths</span>
                            </div>
                            <div class="flex flex-col items-center p-3 bg-slate-50 rounded-xl">
                                <i class="fas fa-vector-square text-primary mb-2 text-lg"></i>
                                <span class="text-xs font-bold text-slate-600">3 Aana</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center py-3.5 rounded-xl font-bold text-sm bg-slate-900 text-white hover:bg-primary transition-colors shadow-md">
                        View Details
                    </a>
                </div>
            </div>

        </div>
        
        <div class="mt-16 text-center">
            <a href="#" class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-bold text-primary bg-blue-50 hover:bg-primary hover:text-white transition-all shadow-sm">
                Explore Full Portfolio <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================
     MARKET INSIGHTS (BLOGS)
     ========================================== -->
<section id="blog" class="py-24 bg-slate-50 relative">
    <div class="container mxauto px-4 md:px-8 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-primary font-bold text-xs tracking-widest uppercase mb-4 shadow-sm border border-slate-100">
                    <i class="fas fa-newspaper"></i> Knowledge Hub
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Market <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Insights</span>
                </h2>
            </div>
            <a href="#" class="hidden md:inline-flex items-center gap-2 font-bold text-primary group">
                <span class="uppercase tracking-widest text-sm border-b-2 border-transparent group-hover:border-primary transition-all">View All Articles</span>
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors">
                    <i class="fas fa-arrow-right text-xs"></i>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog 1 -->
            <article class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 border border-slate-100 flex flex-col">
                <div class="relative h-60 overflow-hidden m-2 rounded-[1.5rem]">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Blog" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-center shadow-sm">
                        <span class="block text-primary font-black text-xl leading-none">15</span>
                        <span class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mt-1">Oct</span>
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs font-bold text-slate-400 mb-4 uppercase tracking-wider">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-accent"></i> Admin</span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-folder text-accent"></i> Investment</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-primary transition-colors leading-snug">
                        <a href="#">Why Kathmandu Valley Real Estate Remains a Secure Investment in 2024</a>
                    </h3>
                    <p class="text-slate-600 text-sm mb-6 line-clamp-3 font-medium flex-grow">
                        Exploring the factors driving property values in the capital and why long-term holding strategies are paying off for investors despite economic fluctuations.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 text-primary font-bold text-sm tracking-wide uppercase group/link">
                        Read Story <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </article>

            <!-- Blog 2 -->
            <article class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 border border-slate-100 flex flex-col">
                <div class="relative h-60 overflow-hidden m-2 rounded-[1.5rem]">
                    <img src="https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Blog" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-center shadow-sm">
                        <span class="block text-primary font-black text-xl leading-none">02</span>
                        <span class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mt-1">Oct</span>
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs font-bold text-slate-400 mb-4 uppercase tracking-wider">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-accent"></i> Admin</span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-folder text-accent"></i> Legal</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-primary transition-colors leading-snug">
                        <a href="#">Understanding Nepal's Land Measurement System: Aana Vs. Square Feet</a>
                    </h3>
                    <p class="text-slate-600 text-sm mb-6 line-clamp-3 font-medium flex-grow">
                        A comprehensive guide for non-resident Nepalis (NRNs) and first-time buyers explaining local measurement units and how to verify land plots.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 text-primary font-bold text-sm tracking-wide uppercase group/link">
                        Read Story <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </article>

            <!-- Blog 3 -->
            <article class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 border border-slate-100 flex flex-col hidden lg:flex">
                <div class="relative h-60 overflow-hidden m-2 rounded-[1.5rem]">
                    <img src="https://images.unsplash.com/photo-1516156008625-3a9d045f6211?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Blog" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-center shadow-sm">
                        <span class="block text-primary font-black text-xl leading-none">28</span>
                        <span class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mt-1">Sep</span>
                    </div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs font-bold text-slate-400 mb-4 uppercase tracking-wider">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-accent"></i> Admin</span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-folder text-accent"></i> Tips</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-primary transition-colors leading-snug">
                        <a href="#">5 Things to Check Before Buying Plotted Land in Suburbs</a>
                    </h3>
                    <p class="text-slate-600 text-sm mb-6 line-clamp-3 font-medium flex-grow">
                        Don't get caught out by infrastructure promises. Learn how to verify road access, drainage approvals, and utility connections before signing.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 text-primary font-bold text-sm tracking-wide uppercase group/link">
                        Read Story <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </article>
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
                <div class="swiper testimonial-swiper pb-12 overflow-visible">
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

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.hero-swiper-container', {
            loop: true, effect: 'fade', fadeEffect: { crossFade: true },
            speed: 1000, autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true }
        });

        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            loop: true, slidesPerView: 1, spaceBetween: 30,
            autoplay: { delay: 6000, disableOnInteraction: false },
            navigation: { nextEl: '.swiper-test-next', prevEl: '.swiper-test-prev' }
        });
    });
</script>
@endpush
