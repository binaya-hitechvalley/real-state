<script>
    // DOM Elements
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const closeSidebar = document.getElementById('closeSidebar');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeToggleCircle = document.getElementById('darkModeToggleCircle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const darkModeForm = document.getElementById('darkModeForm');
    
    // Sidebar state
    let sidebarCollapsed = false;
    
    // Initialize sidebar state on mobile
    if (window.innerWidth < 768) {
        sidebar.classList.add('hidden');
    }
    
    // Toggle sidebar on mobile using header hamburger button
    mobileMenuButton.addEventListener('click', () => {
        sidebar.classList.remove('hidden');
        sidebar.classList.add('absolute', 'z-50', 'h-full');
    });
    
    // Close sidebar on mobile using close button inside sidebar
    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('hidden');
    });
    
    // Toggle sidebar collapse on desktop
    sidebarToggle.addEventListener('click', () => {
        if (window.innerWidth >= 768) {
            toggleSidebarCollapse();
        }
    });
    
    // Toggle user dropdown
    if (userMenuButton) {
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });
    }
    
    // Close user dropdown when clicking elsewhere
    document.addEventListener('click', (e) => {
        if (userMenuButton && !userMenuButton.contains(e.target) && userDropdown && !userDropdown.contains(e.target)) {
            userDropdown.classList.add('hidden');
        }
    });
    
    // Toggle dark mode
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', () => {
            // Submit the form to toggle dark mode
            darkModeForm.submit();
        });
    }
    
    // Handle sidebar dropdown menus
    document.querySelectorAll('.dropdown-parent > a').forEach(dropdownToggle => {
        dropdownToggle.addEventListener('click', function(e) {
            if (window.innerWidth < 768 || !sidebarCollapsed) {
                e.preventDefault();
                const dropdownMenu = this.nextElementSibling;
                const icon = this.querySelector('.fa-chevron-down');
                
                // Close other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) {
                        menu.classList.add('hidden');
                        if (menu.previousElementSibling) {
                            const prevIcon = menu.previousElementSibling.querySelector('.fa-chevron-down');
                            if (prevIcon) {
                                prevIcon.classList.remove('fa-chevron-up');
                                prevIcon.classList.add('fa-chevron-down');
                            }
                        }
                    }
                });
                
                // Toggle current dropdown
                dropdownMenu.classList.toggle('hidden');
                
                // Rotate icon
                if (dropdownMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        });
    });
    
    // Function to toggle sidebar collapse
    function toggleSidebarCollapse() {
        if (sidebarCollapsed) {
            // Expand sidebar
            sidebar.style.width = '18rem'; // w-72 equivalent
            document.querySelectorAll('.sidebar-text').forEach(el => {
                el.style.display = 'block';
            });
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.fa-chevron-down').forEach(icon => {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
            sidebarToggle.innerHTML = '<i class="fas fa-bars text-lg"></i>';
            sidebarCollapsed = false;
        } else {
            // Collapse sidebar
            sidebar.style.width = '5rem'; // w-20 equivalent
            document.querySelectorAll('.sidebar-text').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.fa-chevron-down').forEach(icon => {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
            sidebarToggle.innerHTML = '<i class="fas fa-bars text-lg"></i>';
            sidebarCollapsed = true;
        }
    }
    
    // Handle window resize
    window.addEventListener('resize', () => {
        // If window is resized to desktop size, ensure sidebar is visible
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('hidden', 'absolute', 'z-50', 'h-full');
            
            // Reset sidebar if it was collapsed on mobile
            if (!sidebarCollapsed) {
                sidebar.style.width = '';
            }
        } else {
            // On mobile, hide sidebar
            sidebar.classList.add('hidden');
            sidebar.classList.remove('absolute', 'z-50', 'h-full');
            
            // Reset sidebar to expanded state
            if (sidebarCollapsed) {
                sidebar.style.width = '';
                document.querySelectorAll('.sidebar-text').forEach(el => {
                    el.style.display = 'block';
                });
                sidebarCollapsed = false;
            }
        }
    });
    
    // Add active class to sidebar items on click (for non-dropdown items)
    document.querySelectorAll('aside nav > ul > li > a').forEach(item => {
        if (!item.querySelector('.fa-chevron-down')) {
            item.addEventListener('click', function(e) {
                // On mobile, close sidebar after clicking a link
                if (window.innerWidth < 768) {
                    sidebar.classList.add('hidden');
                    sidebar.classList.remove('absolute', 'z-50', 'h-full');
                }
            });
        }
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768 && 
            sidebar && !sidebar.contains(e.target) && 
            mobileMenuButton && !mobileMenuButton.contains(e.target) &&
            !sidebar.classList.contains('hidden')) {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('absolute', 'z-50', 'h-full');
        }
    });
    
    // CSRF Token setup for AJAX requests
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Simulate dynamic data updates
    function updateDashboardData() {
        // Update notification badge
        const notificationBadge = document.querySelector('.fa-bell')?.parentElement?.querySelector('span');
        if (notificationBadge) {
            const currentNotifications = parseInt(notificationBadge.textContent) || 0;
            const newNotifications = Math.max(0, Math.min(9, currentNotifications + (Math.random() > 0.7 ? 1 : 0)));
            notificationBadge.textContent = newNotifications;
        }
        
        // Update order badge in sidebar
        const orderBadge = document.querySelector('.fa-shopping-cart')?.parentElement?.parentElement?.querySelector('span.bg-red-500');
        if (orderBadge) {
            const currentOrders = parseInt(orderBadge.textContent) || 0;
            const orderChange = Math.random() > 0.5 ? 1 : -1;
            const newOrders = Math.max(0, currentOrders + orderChange);
            orderBadge.textContent = newOrders;
        }
    }
    
    // Update data every 30 seconds if on dashboard
    if (window.location.pathname.includes('dashboard')) {
        setInterval(updateDashboardData, 30000);
        updateDashboardData(); // Initial call
    }
</script>