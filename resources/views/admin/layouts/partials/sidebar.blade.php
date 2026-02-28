<aside id="sidebar" class="sidebar-transition bg-white shadow-lg w-64 md:w-72 flex flex-col">
    <!-- Logo and Toggle -->
    <div class="p-6 border-b border-gray-200 flex items-center justify-between">
        <div class="flex items-center">
            <div class="bg-blue-500 w-8 h-8 rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line text-white"></i>
            </div>
            <h1 class="text-xl font-bold text-gray-800 ml-3 sidebar-text">{{ config('app.name', 'AdminPanel') }}</h1>
        </div>
        <!-- Hide this toggle on mobile, only show on desktop -->
        <button id="sidebarToggle" class="text-gray-500 hidden md:block">
            <i class="fas fa-bars text-lg"></i>
        </button>
        <!-- Close button for mobile sidebar (shown only when sidebar is open on mobile) -->
        <button id="closeSidebar" class="text-gray-500 md:hidden">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>
    
    <!-- User Info (mobile) -->
    <div class="p-4 border-b border-gray-200 md:hidden">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-blue-500"></i>
            </div>
            <div class="ml-3">
                <p class="font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</p>
                <p class="text-sm text-gray-500">{{ Auth::user()->role ?? 'Administrator' }}</p>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 p-4">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 sidebar-text">Main Menu</p>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('dashboard') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-home text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.sliders.index') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.sliders.*') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-images text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Sliders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.property-types.index') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.property-types.*') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-building text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Property Types</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.business-types.index') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.business-types.*') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-briefcase text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Business Types</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.properties.index') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.properties.*') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-home text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Properties</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.property-features.index') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.property-features.*') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-list text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Property Features</span>
                </a>
            </li>
        </ul>
        
        {{-- <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mt-8 mb-4 sidebar-text">Support</p>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('help') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-question-circle text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Help Center</span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-envelope text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Contact</span>
                </a>
            </li>
        </ul> --}}
    </nav>
    
    <!-- Sidebar Footer with Dark Mode Toggle -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center text-gray-600">
            <i id="darkModeIcon" class="fas {{ session('darkMode', false) ? 'fa-sun' : 'fa-moon' }}"></i>
            <span class="ml-2 text-sm sidebar-text">{{ session('darkMode', false) ? 'Light Mode' : 'Dark Mode' }}</span>
            <form id="darkModeForm" action="#" method="POST" class="ml-auto">
                @csrf
                <button type="button" id="darkModeToggle" class="bg-gray-300 w-10 h-5 rounded-full relative focus:outline-none">
                    <div id="darkModeToggleCircle" class="bg-white w-4 h-4 rounded-full absolute top-0.5 transition-transform duration-300 {{ session('darkMode', false) ? 'left-5' : 'left-0.5' }}"></div>
                </button>
            </form>
        </div>
    </div>
</aside>