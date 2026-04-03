@extends('frontend.layouts.master')

@section('title', 'Contact Us | Sapphire Investment')

@section('meta_tags')
<meta name="description" content="Get in touch with Sapphire Investment. Visit our office in Kamaladi, Kathmandu or reach out via phone and email for property inquiries.">
<meta name="keywords" content="contact sapphire investment, real estate contact, property inquiry nepal, kathmandu office">
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTQuNjI3IDI1LjVjMCAxNi4wMTYtMTIuOTg0IDI5LTI5IDI5cy0yOS0xMi45ODQtMjktMjkgMTIuOTg0LTI5IDI5LTI5IDI5IDEyLjk4NCAyOSAyOVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIuMDMiLz48L3N2Zz4=')] opacity-60"></div>
    <div class="absolute top-20 left-20 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-4 md:px-8 max-w-7xl relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-500/10 text-blue-300 text-xs font-bold uppercase tracking-wider mb-6 border border-blue-500/20">
                <i class="fas fa-envelope"></i> Contact us
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight mb-6">
                Let's Start a <br>
                <span class="bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">Conversation</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed max-w-2xl mx-auto">
                Have a question about a property, need investment advice, or want to schedule a site visit? We're here to help.
            </p>
        </div>
    </div>
</section>

<!-- Contact Cards -->
<section class="relative z-10 -mt-12">
    <div class="container mx-auto px-4 md:px-8 max-w-5xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Call Us -->
            <div class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/60 border border-gray-100 text-center group hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-phone-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Call Us</h3>
                <p class="text-slate-500 text-sm mb-3">Mon - Sat, 9 AM to 6 PM</p>
                @php $phone = $settings['contact_phone'] ?? '+977 9851056272'; @endphp
                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="text-blue-600 font-bold text-lg hover:text-blue-700 transition-colors">
                    {{ $phone }}
                </a>
            </div>

            <!-- Email -->
            <div class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/60 border border-gray-100 text-center group hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-envelope text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Email Us</h3>
                <p class="text-slate-500 text-sm mb-3">We'll reply within 24 hours</p>
                @php $email = $settings['contact_email'] ?? 'info@sapphireinvestment.com'; @endphp
                <a href="mailto:{{ $email }}" class="text-blue-600 font-bold hover:text-blue-700 transition-colors">
                    {{ $email }}
                </a>
            </div>

            <!-- Visit Us -->
            <div class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/60 border border-gray-100 text-center group hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-indigo-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-map-marker-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Visit Us</h3>
                <p class="text-slate-500 text-sm mb-3">Walk in during office hours</p>
                <p class="text-blue-600 font-bold">{{ $settings['contact_address'] ?? 'Kamaladi-28, Kathmandu' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 md:p-10 shadow-sm border border-gray-100">
                <h2 class="text-2xl font-black text-slate-900 mb-2">Send Us a Message</h2>
                <p class="text-slate-500 text-sm mb-8">Fill out the form below and our team will get back to you as soon as possible.</p>

                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl mb-6 flex items-center gap-3">
                    <i class="fas fa-check-circle text-emerald-500"></i>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
                @endif

                <form action="{{ route('frontend.contact.store') }}" method="POST" class="space-y-5" id="contactForm">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors @error('name') border-red-400 @enderror"
                                placeholder="Your full name">
                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors @error('email') border-red-400 @enderror"
                                placeholder="Your email address">
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors"
                                placeholder="+977 98XXXXXXXX">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Subject <span class="text-red-500">*</span></label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors @error('subject') border-red-400 @enderror">
                                <option value="">Select a subject</option>
                                <option value="Property Inquiry" {{ old('subject') === 'Property Inquiry' ? 'selected' : '' }}>Property Inquiry</option>
                                <option value="Investment Consultation" {{ old('subject') === 'Investment Consultation' ? 'selected' : '' }}>Investment Consultation</option>
                                <option value="Site Visit Request" {{ old('subject') === 'Site Visit Request' ? 'selected' : '' }}>Site Visit Request</option>
                                <option value="Legal Assistance" {{ old('subject') === 'Legal Assistance' ? 'selected' : '' }}>Legal Assistance</option>
                                <option value="Partnership" {{ old('subject') === 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                <option value="Other" {{ old('subject') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('subject')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Message <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors resize-none @error('message') border-red-400 @enderror"
                            placeholder="Tell us about your requirements...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 rounded-xl font-bold text-lg shadow-lg shadow-blue-600/30 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2" id="submitBtn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>

            <!-- Map & Info -->
            <div class="space-y-8">
                <!-- Map -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 h-80">
                    <iframe 
                        src="{{ $settings['contact_map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.259945037855!2d85.31388031452!3d27.70891803278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190562a30001%3A0xe06f8dcf76ec8e5!2sKamaladi%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1680000000000!5m2!1sen!2snp' }}" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>

                <!-- Office Info -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-slate-800 mb-6">Office Information</h3>
                    <div class="space-y-5">
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Address</h4>
                                <p class="text-slate-500 text-sm mt-1">{{ $settings['contact_address'] ?? 'Kamaladi-28, Kathmandu, Nepal' }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-clock text-emerald-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Working Hours</h4>
                                <p class="text-slate-500 text-sm mt-1">{{ $settings['contact_working_hours_weekday'] ?? 'Sunday - Friday: 9:00 AM - 6:00 PM' }}</p>
                                <p class="text-slate-500 text-sm">{{ $settings['contact_working_hours_saturday'] ?? 'Saturday: 10:00 AM - 4:00 PM' }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-globe text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Connect With Us</h4>
                                <div class="flex gap-3 mt-2">
                                    <a href="{{ $settings['contact_facebook'] ?? '#' }}" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="{{ $settings['contact_instagram'] ?? '#' }}" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-pink-600 hover:text-white transition-all">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="{{ $settings['contact_linkedin'] ?? '#' }}" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-blue-700 hover:text-white transition-all">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '9779851056272' }}" class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-green-600 hover:text-white transition-all">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-3xl">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-50 text-amber-600 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fas fa-question-circle"></i> FAQ
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ openFaq: null }">
            @php
                $faqs = [
                    ['q' => 'How do I schedule a property site visit?', 'a' => 'You can schedule a site visit by filling out the contact form above, calling us directly, or using the "Schedule Visit" button on any property listing page. Our team will coordinate a convenient time for you.'],
                    ['q' => 'What documents do I need to buy property in Nepal?', 'a' => 'For property purchase in Nepal, you typically need citizenship documents, photographs, and financial documentation. Our legal team will guide you through the entire documentation process to ensure a smooth transaction.'],
                    ['q' => 'Do you offer property management services?', 'a' => 'Yes, we offer comprehensive property management services including tenant management, maintenance coordination, rent collection, and regular property inspections for investment properties.'],
                    ['q' => 'What areas do you cover?', 'a' => 'We operate across all 7 provinces of Nepal, with strong presence in Kathmandu Valley, Pokhara, Chitwan, Lumbini, and emerging real estate hubs. Our network of agents ensures local expertise in each region.'],
                    ['q' => 'Are your property listings verified?', 'a' => 'Absolutely. Every property listed on our platform goes through a rigorous verification process including legal document authentication, physical site inspection, and ownership validation before being published.'],
                ];
            @endphp

            @foreach($faqs as $index => $faq)
            <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden">
                <button @click="openFaq === {{ $index }} ? openFaq = null : openFaq = {{ $index }}" 
                    class="w-full flex items-center justify-between p-6 text-left hover:bg-gray-100 transition-colors">
                    <span class="font-bold text-slate-800 pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-slate-400 transition-transform duration-300 shrink-0" :class="{ 'rotate-180': openFaq === {{ $index }} }"></i>
                </button>
                <div x-show="openFaq === {{ $index }}" x-collapse x-cloak>
                    <div class="px-6 pb-6">
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
