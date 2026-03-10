@extends('frontend.layouts.master')

@section('title', 'Contact Us | Sapphire Investment')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    .form-input { width: 100%; border-radius: 0.75rem; border: 1px solid #e2e8f0; padding: 1rem 1.25rem; background-color: #f8fafc; transition: all 0.2s ease; outline: none; font-weight: 500;}
    .form-input:focus { border-color: #3b82f6; background-color: white; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
</style>
@endpush

@section('content')

<!-- ==========================================
     PAGE HEADER
     ========================================== -->
<section class="pt-32 pb-16 bg-slate-900 overflow-hidden relative border-b border-primary/20">
    <!-- Decorative -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542314831-c6a4d14b189a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] opacity-10 bg-cover bg-center mix-blend-overlay"></div>
    <div class="absolute bottom-0 right-0 w-full h-[50vh] bg-gradient-to-t from-slate-900 to-transparent pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center max-w-3xl">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-accent font-bold text-xs tracking-widest uppercase mb-6 shadow-sm border border-white/20">
            <i class="fas fa-headset mr-1"></i> Client Services
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-6">
            Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Touch</span>
        </h1>
        <p class="text-lg text-slate-300 font-medium leading-relaxed">
            Have a question about a property, our services, or looking for investment advice? Our expert advisors are ready to help you navigate the real estate market.
        </p>
    </div>
</section>

<!-- ==========================================
     CONTACT CONTENT
     ========================================== -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Decorative shape -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50 rounded-l-[10rem] pointer-events-none transform translate-x-12"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10 max-w-6xl">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <!-- Left Info Column -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-28 space-y-8">
                    
                    <h2 class="text-3xl font-black text-slate-900 mb-8 tracking-tight">Contact Information</h2>
                    
                    <!-- Info Card 1 -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 text-xl"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1 uppercase tracking-wider">Corporate Office</h4>
                            <p class="text-sm text-slate-600 font-medium leading-relaxed">
                                Sapphire Investment Tower<br>
                                5th Floor, Trade Center Area<br>
                                Jhamsikhel, Lalitpur, Nepal
                            </p>
                        </div>
                    </div>

                    <!-- Info Card 2 -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 text-xl"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1 uppercase tracking-wider">Email Us</h4>
                            <p class="text-sm text-slate-600 font-medium leading-relaxed">
                                <a href="mailto:info@sapphireinvest.com" class="hover:text-primary transition-colors">info@sapphireinvest.com</a><br>
                                <a href="mailto:sales@sapphireinvest.com" class="hover:text-primary transition-colors">sales@sapphireinvest.com</a>
                            </p>
                        </div>
                    </div>

                    <!-- Info Card 3 -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 text-xl"><i class="fas fa-clock"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1 uppercase tracking-wider">Working Hours</h4>
                            <p class="text-sm text-slate-600 font-medium leading-relaxed">
                                Sunday - Friday<br>
                                9:30 AM to 6:00 PM (NPT)
                            </p>
                        </div>
                    </div>

                    <div class="pt-8 mt-8 border-t border-slate-100 flex gap-4">
                        <a href="tel:+97711234567" class="flex-1 py-4 bg-slate-900 text-white font-bold rounded-xl shadow-lg hover:bg-primary transition-colors flex justify-center items-center gap-2 group">
                            <i class="fas fa-phone-alt group-hover:-rotate-12 transition-transform"></i> Call Now
                        </a>
                        <a href="https://wa.me/9779800000000" target="_blank" class="flex-1 py-4 bg-green-500 text-white font-bold rounded-xl shadow-lg shadow-green-500/30 hover:bg-green-600 transition-colors flex justify-center items-center gap-2">
                            <i class="fab fa-whatsapp text-lg"></i> WhatsApp
                        </a>
                    </div>

                    <div class="pt-8">
                         <h4 class="font-bold text-slate-900 text-sm mb-4 uppercase tracking-wider">Find Us on Map</h4>
                         <div id="officeMap" class="w-full h-64 bg-slate-200 rounded-2xl overflow-hidden border border-slate-200"></div>
                    </div>
                </div>
            </div>

            <!-- Right Form Column -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white border-2 border-slate-100 rounded-[2.5rem] p-8 md:p-12 shadow-xl shadow-blue-900/5 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary to-accent"></div>
                    
                    <h3 class="text-3xl font-black text-slate-900 mb-2">Send us a Message</h3>
                    <p class="text-slate-500 font-medium mb-10">Fill out the form below and one of our experts will get back to you within 24 hours.</p>
                    
                    <form action="#" method="POST" class="space-y-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">First Name <span class="text-red-500">*</span></label>
                                <input type="text" name="first_name" placeholder="John" class="form-input" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" name="last_name" placeholder="Doe" class="form-input" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email" placeholder="john@example.com" class="form-input" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone" placeholder="+977 9800000000" class="form-input" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Inquiry Type</label>
                            <div class="relative">
                                <select name="inquiry_type" class="form-input appearance-none cursor-pointer">
                                    <option value="buy">I want to buy a property</option>
                                    <option value="sell">I want to sell my property</option>
                                    <option value="rent">I am looking for rentals</option>
                                    <option value="invest">General Investment Advice</option>
                                    <option value="other">Other Inquiry</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your Message <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" placeholder="Tell us how we can help you..." class="form-input resize-none" required></textarea>
                        </div>

                        <div class="pt-4 flex flex-col md:flex-row items-center justify-between gap-6 border-t border-slate-100">
                            <p class="text-xs text-slate-400 font-medium md:flex-1">
                                By submitting this form, you agree to our <a href="#" class="text-primary hover:underline">Privacy Policy</a> and consent to being contacted by Sapphire Investment.
                            </p>
                            <button type="button" onclick="alert('Form submitted! (Demo only)')" class="w-full md:w-auto px-10 py-4 bg-gradient-to-r from-primary to-accent text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-1 transition-all flex justify-center items-center gap-2">
                                Send Message <i class="fas fa-paper-plane text-sm"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Office Map (Jhamsikhel area coordinates)
        const map = L.map('officeMap', { zoomControl: false }).setView([27.6749, 85.3121], 15);
        L.control.zoom({ position: 'bottomright' }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
            maxZoom: 20
        }).addTo(map);

        const customIcon = L.divIcon({
            className: 'custom-pin',
            html: `<div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center shadow-xl border-2 border-white"><i class="fas fa-building"></i></div>`,
            iconSize: [40, 40],
            iconAnchor: [20, 20]
        });

        L.marker([27.6749, 85.3121], {icon: customIcon}).addTo(map)
            .bindPopup('<b class="font-bold text-slate-900">Sapphire HQ</b><br><span class="text-slate-500 text-xs">Jhamsikhel, Lalitpur</span>')
            .openPopup();
    });
</script>
@endpush
