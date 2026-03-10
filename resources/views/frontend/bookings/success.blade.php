@extends('frontend.layouts.master')

@section('title', 'Booking Confirmed | Sapphire Investment')

@push('styles')
<style>
    .success-icon-container {
        width: 100px; height: 100px; background-color: #ecfdf5; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem auto; position: relative; animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    .success-icon-container::after {
        content: ''; position: absolute; inset: -10px; border-radius: 50%; border: 2px solid #10b981; opacity: 0; animation: ripple 1.5s infinite;
    }
    
    @keyframes popIn { 0% { opacity: 0; transform: scale(0.5); } 100% { opacity: 1; transform: scale(1); } }
    @keyframes ripple { 0% { transform: scale(0.8); opacity: 1; } 100% { transform: scale(1.5); opacity: 0; } }
</style>
@endpush

@section('content')

<section class="min-h-screen pt-32 pb-24 bg-slate-50 relative overflow-hidden flex items-center justify-center">
    <!-- Decorative blobs -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-green-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 max-w-2xl">
        
        <div class="bg-white rounded-[3rem] shadow-xl shadow-blue-900/5 overflow-hidden border border-slate-100 p-10 md:p-16 text-center">
            
            <div class="success-icon-container shadow-sm border border-green-100">
                <i class="fas fa-check text-4xl text-emerald-500"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-4">
                Booking <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-green-400">Confirmed!</span>
            </h1>
            
            <p class="text-slate-500 font-medium text-lg leading-relaxed mb-10 max-w-lg mx-auto">
                Thank you for your interest. Your site visit request has been successfully received. One of our dedicated property advisors will contact you shortly to confirm the exact schedule.
            </p>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 text-left mb-10 inline-block md:min-w-[400px]">
                <h4 class="font-bold text-slate-800 text-sm mb-4 uppercase tracking-wider border-b border-slate-200 pb-2">Next Steps</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-primary flex items-center justify-center flex-shrink-0 text-xs mt-0.5"><i class="fas fa-phone-volume"></i></div>
                        <p class="text-sm font-medium text-slate-600">Expect a confirmation call within 2 hours.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-primary flex items-center justify-center flex-shrink-0 text-xs mt-0.5"><i class="fas fa-envelope-open-text"></i></div>
                        <p class="text-sm font-medium text-slate-600">Check your email for booking reference itinerary.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-primary flex items-center justify-center flex-shrink-0 text-xs mt-0.5"><i class="fas fa-map-marked-alt"></i></div>
                        <p class="text-sm font-medium text-slate-600">Location map will be sent via WhatsApp prior to visit.</p>
                    </li>
                </ul>
            </div>

            <h3 class="text-xl font-bold text-slate-800 mb-6">Need immediate assistance?</h3>
            <div class="flex flex-col sm:flex-row justify-center gap-4 border-t border-slate-100 pt-8">
                <a href="https://wa.me/9779800000000" target="_blank" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white bg-green-500 rounded-full shadow-lg shadow-green-500/20 hover:shadow-green-500/40 transition-all hover:-translate-y-1 gap-2">
                    <i class="fab fa-whatsapp text-lg"></i> WhatsApp Us
                </a>
                <a href="tel:+9779800000000" class="inline-flex items-center justify-center px-8 py-4 font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-full hover:border-primary hover:text-primary transition-all hover:-translate-y-1 gap-2">
                    <i class="fas fa-phone-alt"></i> Call Advisor directly
                </a>
            </div>

            <div class="mt-8">
                <a href="/" class="text-sm font-bold text-slate-400 hover:text-primary transition-colors underline decoration-2 underline-offset-4">
                    Return to Homepage
                </a>
            </div>
            
        </div>
    </div>
</section>

@endsection
