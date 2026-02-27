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
            
            <!-- Dropdown Menu Example 1 -->
            <li class="dropdown-parent">
                <a href="#" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100">
                    <div class="flex items-center">
                        <i class="fas fa-users text-blue-500 w-5"></i>
                        <span class="ml-3 font-medium sidebar-text">User Management</span>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs sidebar-text"></i>
                </a>
                <ul class="dropdown-menu mt-1 ml-8 space-y-1 hidden">
                    <li><a href="{{ route('users.index') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">All Users</a></li>
                    <li><a href="{{ route('users.create') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Add New User</a></li>
                    <li><a href="{{ route('roles.index') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">User Roles</a></li>
                    <li><a href="{{ route('permissions.index') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Permissions</a></li>
                </ul>
            </li>
            
            <!-- Dropdown Menu Example 2 -->
            <li class="dropdown-parent">
                <a href="#" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100">
                    <div class="flex items-center">
                        <i class="fas fa-shopping-cart text-blue-500 w-5"></i>
                        <span class="ml-3 font-medium sidebar-text">Orders</span>
                        <span class="ml-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full sidebar-text">12</span>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs sidebar-text"></i>
                </a>
                <ul class="dropdown-menu mt-1 ml-8 space-y-1 hidden">
                    <li><a href="{{ route('orders.index') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">All Orders</a></li>
                    <li><a href="{{ route('orders.pending') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Pending Orders</a></li>
                    <li><a href="{{ route('orders.completed') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Completed Orders</a></li>
                    <li><a href="{{ route('orders.reports') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Order Reports</a></li>
                </ul>
            </li>
            
            <li>
                <a href="{{ route('analytics') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('analytics') ? 'active-sidebar-item' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-chart-bar text-blue-500 w-5"></i>
                    <span class="ml-3 font-medium sidebar-text">Analytics</span>
                </a>
            </li>
            
            <!-- Dropdown Menu Example 3 -->
            <li class="dropdown-parent">
                <a href="#" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100">
                    <div class="flex items-center">
                        <i class="fas fa-cog text-blue-500 w-5"></i>
                        <span class="ml-3 font-medium sidebar-text">Settings</span>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs sidebar-text"></i>
                </a>
                <ul class="dropdown-menu mt-1 ml-8 space-y-1 hidden">
                    <li><a href="{{ route('settings.general') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">General Settings</a></li>
                    <li><a href="{{ route('settings.notifications') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Notifications</a></li>
                    <li><a href="{{ route('settings.security') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Security</a></li>
                    <li><a href="{{ route('settings.billing') }}" class="block p-2 rounded hover:bg-gray-100 sidebar-text">Billing</a></li>
                </ul>
            </li>
        </ul>
        
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mt-8 mb-4 sidebar-text">Support</p>
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
        </ul>
    </nav>
    
    <!-- Sidebar Footer with Dark Mode Toggle -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center text-gray-600">
            <i id="darkModeIcon" class="fas {{ session('darkMode', false) ? 'fa-sun' : 'fa-moon' }}"></i>
            <span class="ml-2 text-sm sidebar-text">{{ session('darkMode', false) ? 'Light Mode' : 'Dark Mode' }}</span>
            <form id="darkModeForm" action="{{ route('toggle-dark-mode') }}" method="POST" class="ml-auto">
                @csrf
                <button type="button" id="darkModeToggle" class="bg-gray-300 w-10 h-5 rounded-full relative focus:outline-none">
                    <div id="darkModeToggleCircle" class="bg-white w-4 h-4 rounded-full absolute top-0.5 transition-transform duration-300 {{ session('darkMode', false) ? 'left-5' : 'left-0.5' }}"></div>
                </button>
            </form>
        </div>
    </div>
</aside>