<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FarmFresh Admin')</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Sidebar transition */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Active menu item */
        .menu-active {
            background: linear-gradient(90deg, #059669 0%, #047857 100%);
            border-right: 4px solid #10b981;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.2);
        }
        
        /* Menu hover effect */
        .menu-item:hover {
            background: rgba(5, 150, 105, 0.1);
            transform: translateX(2px);
        }
        
        .menu-active:hover {
            background: linear-gradient(90deg, #047857 0%, #065f46 100%);
            transform: translateX(0);
        }
        
        @media (max-width: 768px) {
            .sidebar-hidden {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Mobile Menu Overlay -->
    <div x-data="{ sidebarOpen: false }" class="relative">
        <!-- Overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden"
             @click="sidebarOpen = false">
        </div>

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
             class="fixed top-0 left-0 w-64 bg-white border-r border-gray-200 h-screen shadow-lg flex flex-col z-50 sidebar-transition custom-scrollbar overflow-y-auto">
            
            <!-- Logo / Title - Adjusted height to match header -->
            <div class="h-[73px] flex items-center px-6 border-b border-gray-100 bg-gradient-to-r from-green-50 to-orange-50">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-orange-500 rounded-xl flex items-center justify-center mr-3 shadow-md">
                        <i class="fas fa-leaf text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">
                            <span class="text-orange-600">Farm</span><span class="text-green-600">Fresh</span>
                        </h1>
                        <p class="text-gray-500 text-xs font-medium">Admin Panel</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('dashboard.index') }}"
                   class="flex items-center py-3 px-4 rounded-lg text-gray-700 transition-all duration-200 menu-item {{ request()->routeIs('dashboard.index') ? 'menu-active text-white' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 text-center mr-3 text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Products -->
                <a href="{{ route('produk.index') }}"
                   class="flex items-center py-3 px-4 rounded-lg text-gray-700 transition-all duration-200 menu-item {{ request()->routeIs('produk.*') ? 'menu-active text-white' : '' }}">
                    <i class="fas fa-box w-5 text-center mr-3 text-lg"></i>
                    <span class="font-medium">Products</span>
                </a>

                <!-- Categories -->
                <a href="{{ route('kategori.index') }}"
                   class="flex items-center py-3 px-4 rounded-lg text-gray-700 transition-all duration-200 menu-item {{ request()->routeIs('kategori.*') ? 'menu-active text-white' : '' }}">
                    <i class="fas fa-tags w-5 text-center mr-3 text-lg"></i>
                    <span class="font-medium">Categories</span>
                </a>

                <!-- Farmers -->
                <a href="{{ route('petani.index') }}"
                   class="flex items-center py-3 px-4 rounded-lg text-gray-700 transition-all duration-200 menu-item {{ request()->routeIs('petani.*') ? 'menu-active text-white' : '' }}">
                    <i class="fas fa-users w-5 text-center mr-3 text-lg"></i>
                    <span class="font-medium">Farmers</span>
                </a>
            </nav>

            <!-- User Profile Section -->
            <div class="p-4 border-t border-gray-100 bg-gray-50">
                <!-- User Info -->
                <div class="flex items-center mb-4 p-3 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-orange-500 rounded-full flex items-center justify-center mr-3 shadow-sm">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-900 text-sm font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-gray-500 text-xs">Administrator</p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="space-y-1">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to logout?')"
                                class="w-full flex items-center py-2 px-3 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                            <i class="fas fa-sign-out-alt w-4 text-center mr-3"></i>
                            <span class="text-sm font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="md:ml-64 flex flex-col min-h-screen">
            <!-- Top Navigation Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30 h-[73px] flex items-center">
                <div class="flex items-center justify-between px-6 w-full">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen" 
                            class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                    <!-- Page Title -->
                    <div class="flex-1 md:flex-none">
                        <h1 class="text-2xl font-bold text-gray-900">@yield('header', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">@yield('description', 'Manage your farm business')</p>
                    </div>

                    <!-- Right side actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full relative transition-colors">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Menu -->
                        <div class="relative" x-data="{ userMenuOpen: false }">
                            <button @click="userMenuOpen = !userMenuOpen" 
                                    class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-600 to-orange-500 rounded-full flex items-center justify-center shadow-sm">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-500 transition-transform" :class="userMenuOpen ? 'rotate-180' : ''"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="userMenuOpen" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 @click.away="userMenuOpen = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 border border-gray-200">
                                <a href="#" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-user mr-2 text-gray-500"></i>Profile
                                </a>
                                <a href="#" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-cog mr-2 text-gray-500"></i>Settings
                                </a>
                                <hr class="my-1">
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to logout?')"
                                            class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Alert Messages -->
                @if(session('success'))
                    <x-nontifikasi type="success" />
                @endif

                @if(session('error'))
                    <x-nontifikasi type="error" />
                @endif

                <!-- Main Content -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
