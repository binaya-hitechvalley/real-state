<!-- Header Partial -->
<header x-data="{ mobileMenuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{ 'bg-white/80 backdrop-blur-md shadow-lg shadow-blue-900/5 border-b border-white/20 py-3': scrolled, 'bg-transparent py-5': !scrolled }"
        class="fixed w-full z-50 transition-all duration-500 top-0 left-0">
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <div class="relative w-12 h-12 flex items-center justify-center">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary to-accent rounded-xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300"></div>
                    <div class="absolute inset-[2px] bg-white rounded-xl transform -rotate-3 group-hover:rotate-0 transition-transform duration-300 flex items-center justify-center">
                        <span class="text-primary font-black text-2xl tracking-tighter">S</span>
                    </div>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-2xl font-black tracking-tight" :class="{ 'text-slate-900': scrolled, 'text-white': !scrolled }">
                        Sapphire
                    </span>
                    <span class="text-xs font-bold tracking-[0.2em] uppercase" :class="{ 'text-primary': scrolled, 'text-blue-300': !scrolled }">
                        Investment
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-1 p-1 rounded-full border" 
                 :class="{ 'bg-slate-100/50 border-white/50': scrolled, 'bg-white/10 backdrop-blur-md border-white/20': !scrolled }">
                <a href="/" class="px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:bg-white hover:text-primary hover:shadow-sm" 
                   :class="{ 'text-slate-700': scrolled, 'text-white': !scrolled }">Home</a>
                <a href="#about" class="px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:bg-white hover:text-primary hover:shadow-sm" 
                   :class="{ 'text-slate-700': scrolled, 'text-white/90': !scrolled }">About</a>
                <a href="#properties" class="px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:bg-white hover:text-primary hover:shadow-sm" 
                   :class="{ 'text-slate-700': scrolled, 'text-white/90': !scrolled }">Properties</a>
                <a href="#blog" class="px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:bg-white hover:text-primary hover:shadow-sm" 
                   :class="{ 'text-slate-700': scrolled, 'text-white/90': !scrolled }">Insights</a>
                <a href="#contact" class="px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 hover:bg-white hover:text-primary hover:shadow-sm" 
                   :class="{ 'text-slate-700': scrolled, 'text-white/90': !scrolled }">Contact</a>
            </nav>

            <!-- Actions -->
            <div class="hidden md:flex items-center gap-3">
                <a href="/login" class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300"
                   :class="{ 'text-slate-700 hover:text-primary hover:bg-slate-100': scrolled, 'text-white hover:text-white hover:bg-white/20': !scrolled }">
                    Sign In
                </a>
                <a href="/register" class="bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-accent text-white px-7 py-2.5 rounded-full font-bold text-sm shadow-md shadow-blue-900/20 hover:shadow-lg hover:shadow-blue-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
                    Get Started
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-10 h-10 flex flex-col justify-center items-center gap-1.5 z-50">
                <span class="block w-6 h-0.5 rounded-full transition-all duration-300 origin-center" 
                      :class="[scrolled ? 'bg-slate-900' : 'bg-white', mobileMenuOpen ? 'rotate-45 translate-y-2' : '']"></span>
                <span class="block w-6 h-0.5 rounded-full transition-all duration-300" 
                      :class="[scrolled ? 'bg-slate-900' : 'bg-white', mobileMenuOpen ? 'opacity-0' : '']"></span>
                <span class="block w-6 h-0.5 rounded-full transition-all duration-300 origin-center" 
                      :class="[scrolled ? 'bg-slate-900' : 'bg-white', mobileMenuOpen ? '-rotate-45 -translate-y-2' : '']"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 backdrop-blur-none"
         x-transition:enter-end="opacity-100 backdrop-blur-xl"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 backdrop-blur-xl"
         x-transition:leave-end="opacity-0 backdrop-blur-none"
         class="fixed inset-0 bg-slate-900/95 z-40 lg:hidden flex flex-col justify-center items-center h-screen" style="display: none;">
        
        <nav class="flex flex-col items-center gap-8 text-center px-4 w-full max-w-sm">
            <a href="/" @click="mobileMenuOpen = false" class="text-3xl font-bold text-white hover:text-accent transition-colors">Home</a>
            <a href="#about" @click="mobileMenuOpen = false" class="text-3xl font-bold text-white hover:text-accent transition-colors">About</a>
            <a href="#properties" @click="mobileMenuOpen = false" class="text-3xl font-bold text-white hover:text-accent transition-colors">Properties</a>
            <a href="#blog" @click="mobileMenuOpen = false" class="text-3xl font-bold text-white hover:text-accent transition-colors">Insights</a>
            <a href="#contact" @click="mobileMenuOpen = false" class="text-3xl font-bold text-white hover:text-accent transition-colors">Contact</a>
            
            <div class="h-px w-24 bg-white/20 my-4"></div>
            
            <a href="/login" class="w-full text-center text-white text-xl font-bold py-3 px-8 rounded-full border border-white/20 hover:bg-white/10 transition">Sign In</a>
            <a href="/register" class="w-full text-center bg-gradient-to-r from-primary to-accent text-white text-xl font-bold py-3 px-8 rounded-full shadow-lg shadow-blue-900/50">Get Started</a>
        </nav>
    </div>
</header>
