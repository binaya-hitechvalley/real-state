<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between p-4">
        <!-- Left: Menu button -->
        <div class="flex items-center">
            <button id="mobileMenuButton" class="text-gray-500 mr-4 md:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="text-gray-800">
                <h2 class="text-xl font-bold">@yield('page-title', 'Dashboard')</h2>
                <p class="text-sm text-gray-600 hidden md:block">@yield('page-subtitle', 'Welcome to your admin panel')</p>
            </div>
        </div>
        
        <!-- Right: User info and notification -->
        <div class="flex items-center">
            <!-- Notification -->
            <button class="relative mr-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
            </button>
            
            <!-- User details with dropdown -->
            <div class="relative">
                <button id="userMenuButton" class="flex items-center">
                    <div class="hidden md:block text-right mr-4">
                        <p class="font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->role ?? 'Administrator' }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-500"></i>
                    </div>
                    <i class="fas fa-chevron-down text-gray-500 ml-2 text-sm"></i>
                </button>
                
                <!-- User Dropdown Menu -->
                <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 hidden dropdown-enter">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <p class="font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                        <span>My Profile</span>
                    </a>
                    <a href="{{ route('settings') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-cog mr-3 text-gray-500"></i>
                        <span>Account Settings</span>
                    </a>
                    <a href="{{ route('help') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-question-circle mr-3 text-gray-500"></i>
                        <span>Help & Support</span>
                    </a>
                    <div class="border-t border-gray-200"></div>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 text-red-600 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>