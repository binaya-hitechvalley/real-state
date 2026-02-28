<!DOCTYPE html>
<html lang="en" class="{{ session('darkMode', false) ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        @include('admin.layouts.partials.sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.layouts.partials.header')
            
            <main class="flex-1 overflow-y-auto p-4 md:p-6">
                @yield('content')
            </main>
            
            @include('admin.layouts.partials.footer')
        </div>
    </div>
    
    @include('admin.layouts.partials.script')
    @stack('scripts')
</body>
</html>