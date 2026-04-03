@extends('frontend.layouts.master')

@section('title', 'About Us | Sapphire Investment')

@section('meta_tags')
<meta name="description" content="Learn about Sapphire Investment - Nepal's trusted real estate partner. Discover our mission, values, and the team behind your next property investment.">
<meta name="keywords" content="sapphire investment, about us, real estate nepal, property investment, kathmandu real estate">
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative pt-32 pb-24 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTQuNjI3IDI1LjVjMCAxNi4wMTYtMTIuOTg0IDI5LTI5IDI5cy0yOS0xMi45ODQtMjktMjkgMTIuOTg0LTI5IDI5LTI5IDI5IDEyLjk4NCAyOSAyOVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIuMDMiLz48L3N2Zz4=')] opacity-60"></div>
    <div class="absolute top-20 right-20 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-4 md:px-8 max-w-7xl relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-500/10 text-blue-300 text-xs font-bold uppercase tracking-wider mb-6 border border-blue-500/20">
                <i class="fas fa-building"></i> About us
            </span>
            @php
                $heroTitle = $settings['about_hero_title'] ?? 'Building Trust in Real Estate Investment';
                $heroParts = explode(' ', $heroTitle, 4);
            @endphp
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight mb-6">
                {{ implode(' ', array_slice($heroParts, 0, 3)) }} <br>
                <span class="bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">{{ implode(' ', array_slice($heroParts, 3)) ?: 'Real Estate Investment' }}</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed max-w-2xl mx-auto">
                {{ $settings['about_hero_subtitle'] ?? "Sapphire Investment is Nepal's premier real estate consultancy, helping investors and families find verified, high-potential properties across the country." }}
            </p>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="relative z-10 -mt-12">
    <div class="container mx-auto px-4 md:px-8 max-w-5xl">
        @php
            $stats = [
                ['value' => $settings['about_stat_1_value'] ?? '500+', 'label' => $settings['about_stat_1_label'] ?? 'Properties Sold', 'target' => 500, 'suffix' => '+'],
                ['value' => $settings['about_stat_2_value'] ?? '12+', 'label' => $settings['about_stat_2_label'] ?? 'Years Experience', 'target' => 12, 'suffix' => '+'],
                ['value' => $settings['about_stat_3_value'] ?? '50+', 'label' => $settings['about_stat_3_label'] ?? 'Expert Agents', 'target' => 50, 'suffix' => '+'],
                ['value' => $settings['about_stat_4_value'] ?? '98%', 'label' => $settings['about_stat_4_label'] ?? 'Client Satisfaction', 'target' => 98, 'suffix' => '%'],
            ];
        @endphp
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-gray-100 p-8 grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($stats as $stat)
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-black text-blue-600 mb-1">{{ $stat['value'] }}</div>
                <p class="text-slate-500 text-sm font-medium">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Image Grid -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="rounded-2xl overflow-hidden h-48 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center shadow-lg">
                            <i class="fas fa-city text-6xl text-blue-300"></i>
                        </div>
                        <div class="rounded-2xl overflow-hidden h-64 bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center shadow-lg">
                            <i class="fas fa-handshake text-7xl text-indigo-300"></i>
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="rounded-2xl overflow-hidden h-64 bg-gradient-to-br from-cyan-100 to-cyan-50 flex items-center justify-center shadow-lg">
                            <i class="fas fa-home text-7xl text-cyan-300"></i>
                        </div>
                        <div class="rounded-2xl overflow-hidden h-48 bg-gradient-to-br from-emerald-100 to-emerald-50 flex items-center justify-center shadow-lg">
                            <i class="fas fa-chart-line text-6xl text-emerald-300"></i>
                        </div>
                    </div>
                </div>
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -right-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-5 shadow-xl shadow-blue-600/30">
                    <p class="text-3xl font-black">12+</p>
                    <p class="text-xs font-bold tracking-wider uppercase text-blue-200">Years Strong</p>
                </div>
            </div>

            <!-- Content -->
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider mb-4">
                    <i class="fas fa-star"></i> Our Story
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight mb-6 leading-tight">
                    {{ $settings['about_story_title'] ?? "Transforming Nepal's Real Estate Landscape" }}
                </h2>
                @php
                    $storyContent = $settings['about_story_content'] ?? "Founded with a vision to bring transparency and trust to Nepal's property market, Sapphire Investment has grown from a small consultancy to one of the most recognized names in real estate. Our journey began with the simple belief that every family and investor deserves access to verified, high-quality property options.\n\nToday, we operate across multiple provinces, with a team of seasoned professionals who understand the nuances of Nepal's diverse real estate landscape. From the bustling Kathmandu Valley to the serene hills of Pokhara, we've helped hundreds of clients find their perfect property.";
                @endphp
                @foreach(explode("\n", $storyContent) as $para)
                    @if(trim($para))
                    <p class="text-slate-600 leading-relaxed mb-6">{{ trim($para) }}</p>
                    @endif
                @endforeach
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <i class="fas fa-check-circle text-emerald-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Verified Properties</h4>
                        <p class="text-xs text-slate-500 mt-1">Every listing is thoroughly vetted and verified</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <i class="fas fa-shield-alt text-blue-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Legal Support</h4>
                        <p class="text-xs text-slate-500 mt-1">Complete legal documentation assistance</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <i class="fas fa-chart-bar text-indigo-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Market Analysis</h4>
                        <p class="text-xs text-slate-500 mt-1">Data-driven property valuations</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <i class="fas fa-users text-cyan-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Dedicated Team</h4>
                        <p class="text-xs text-slate-500 mt-1">Personal agents for every client</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fas fa-bullseye"></i> What Drives Us
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Our Mission & Vision</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-rocket text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Our Mission</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $settings['about_mission'] ?? 'To democratize real estate investment in Nepal by providing verified, transparent, and accessible property solutions for every investor, regardless of scale. We aim to set the industry standard for trust and reliability.' }}
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center mb-6 shadow-lg shadow-indigo-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-eye text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Our Vision</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $settings['about_vision'] ?? "To become Nepal's most trusted real estate platform, establishing a digitally integrated marketplace where buyers, sellers, and investors can connect with complete confidence and security." }}
                </p>
            </div>

            <!-- Values -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-cyan-600 flex items-center justify-center mb-6 shadow-lg shadow-cyan-500/30 group-hover:scale-110 transition-transform">
                    <i class="fas fa-heart text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Our Values</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $settings['about_values'] ?? 'Transparency, integrity, and client-first approach guide everything we do. We believe sustainable growth comes from building lasting relationships, not short-term transactions.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fas fa-award"></i> Why Sapphire
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">What Sets Us Apart</h2>
            <p class="text-slate-500 mt-4">We go beyond traditional real estate services to deliver an experience that's exceptional at every step.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex gap-5 p-6 rounded-2xl hover:bg-slate-50 transition-colors group">
                <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 group-hover:bg-blue-100 transition-colors">
                    <i class="fas fa-search-location text-2xl text-blue-600"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Comprehensive Property Search</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Advanced filtering by location, price, type, and more. We make finding your ideal property effortless with province-level precision.</p>
                </div>
            </div>
            <div class="flex gap-5 p-6 rounded-2xl hover:bg-slate-50 transition-colors group">
                <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                    <i class="fas fa-file-contract text-2xl text-emerald-600"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">End-to-End Documentation</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">From Lalpurja verification to final registration, we handle all paperwork so you can focus on your investment vision.</p>
                </div>
            </div>
            <div class="flex gap-5 p-6 rounded-2xl hover:bg-slate-50 transition-colors group">
                <div class="w-14 h-14 rounded-xl bg-purple-50 flex items-center justify-center shrink-0 group-hover:bg-purple-100 transition-colors">
                    <i class="fas fa-map-marked-alt text-2xl text-purple-600"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Local Market Expertise</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Deep knowledge of Nepal's diverse real estate markets — from urban Kathmandu to emerging hubs in Chitwan, Pokhara, and beyond.</p>
                </div>
            </div>
            <div class="flex gap-5 p-6 rounded-2xl hover:bg-slate-50 transition-colors group">
                <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center shrink-0 group-hover:bg-amber-100 transition-colors">
                    <i class="fas fa-headset text-2xl text-amber-600"></i>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2">Dedicated Client Support</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">A dedicated property consultant assigned to you from day one, available via phone, email, or in-person meetings.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTQuNjI3IDI1LjVjMCAxNi4wMTYtMTIuOTg0IDI5LTI5IDI5cy0yOS0xMi45ODQtMjktMjkgMTIuOTg0LTI5IDI5LTI5IDI5IDEyLjk4NCAyOSAyOVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIuMDMiLz48L3N2Zz4=')] opacity-60"></div>

    <div class="container mx-auto px-4 md:px-8 max-w-7xl relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 text-blue-300 text-xs font-bold uppercase tracking-wider mb-4 border border-blue-500/20">
                <i class="fas fa-users"></i> Our Team
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-white tracking-tight">Meet the Experts</h2>
            <p class="text-slate-400 mt-4">A dedicated team of professionals committed to making your real estate journey seamless.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $icons = ['fas fa-user-tie', 'fas fa-user-cog', 'fas fa-user-shield', 'fas fa-user-graduate'];
                $colors = ['from-blue-500 to-blue-600', 'from-indigo-500 to-indigo-600', 'from-cyan-500 to-cyan-600', 'from-emerald-500 to-emerald-600'];
                $defaultNames = ['Rajesh Sharma', 'Sita Thapa', 'Bikash Adhikari', 'Priya Maharjan'];
                $defaultRoles = ['Founder & CEO', 'Head of Operations', 'Senior Property Consultant', 'Legal Advisor'];
                $team = [];
                for ($i = 0; $i < 4; $i++) {
                    $name = $settings['about_team_member_'.($i+1).'_name'] ?? $defaultNames[$i];
                    $role = $settings['about_team_member_'.($i+1).'_role'] ?? $defaultRoles[$i];
                    if ($name) {
                        $team[] = ['name' => $name, 'role' => $role, 'icon' => $icons[$i], 'color' => $colors[$i]];
                    }
                }
            @endphp

            @foreach($team as $member)
            <div class="group text-center">
                <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br {{ $member['color'] }} flex items-center justify-center mb-5 shadow-xl group-hover:scale-110 transition-transform duration-300">
                    <i class="{{ $member['icon'] }} text-4xl text-white"></i>
                </div>
                <h4 class="text-lg font-bold text-white mb-1">{{ $member['name'] }}</h4>
                <p class="text-slate-400 text-sm">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-4xl">
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-10 md:p-16 text-center relative overflow-hidden shadow-2xl shadow-blue-900/30">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Ready to Start Your Journey?</h2>
                <p class="text-blue-100 text-lg mb-8 max-w-xl mx-auto">Whether you're buying your first home or expanding your investment portfolio, we're here to help.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('frontend.contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-50 transition-colors shadow-lg">
                        <i class="fas fa-envelope mr-2"></i> Contact Us
                    </a>
                    <a href="{{ route('frontend.properties.index') }}" class="bg-white/10 border border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-colors">
                        <i class="fas fa-search mr-2"></i> Browse Properties
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
