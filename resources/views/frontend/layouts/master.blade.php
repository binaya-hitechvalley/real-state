<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $generalSettings = $generalSettings ?? [];
        $siteTitle = $generalSettings['site_title'] ?? config('app.name', 'Sapphire Investment');
        $siteFavicon = $generalSettings['site_favicon'] ?? null;
    @endphp

    <title>@yield('title', $siteTitle)</title>
    @if($siteFavicon)
        <link rel="icon" href="{{ asset('storage/' . $siteFavicon) }}">
    @endif
    @hasSection('meta_tags')
        @yield('meta_tags')
    @else
        <meta name="description" content="{{ $generalSettings['site_description'] ?? '' }}">
        <meta name="keywords" content="{{ $generalSettings['site_keywords'] ?? '' }}">
    @endif
    
    <!-- Tailwind CSS CDN for temporary preview -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a',
                        secondary: '#3b82f6',
                        accent: '#0ea5e9'
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Swiper CSS for Sliders -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">
    
    <!-- Top Header Navigation -->
    @include('frontend.layouts.partials.header')

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Area -->
    @include('frontend.layouts.partials.footer')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
