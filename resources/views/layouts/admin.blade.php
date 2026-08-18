<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard - Portfolio')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- Tailwind CSS CDN & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f5ff',
                            500: '#4f46e5',
                            600: '#4338ca',
                            700: '#3730a3',
                        },
                        dark: {
                            bg: '#1c2434',
                            sidebar: '#1c2434',
                            card: '#24303f',
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased min-h-screen flex flex-col">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-40 w-64 bg-[#1C2434] text-gray-300 transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0 flex flex-col"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <!-- Sidebar Header / Logo -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-white font-bold text-xl tracking-wider">
                    <span class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center text-white text-lg">
                        <i class="fa-solid fa-briefcase"></i>
                    </span>
                    <span>Portfolio</span>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Navigation Links (Scrollbar Hidden) -->
            <div class="flex-1 overflow-y-auto no-scrollbar px-4 py-6 space-y-1">
                <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu</div>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.about.edit') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.about.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-user-gear w-5"></i>
                    <span>Hero & About</span>
                </a>

                <a href="{{ route('admin.portfolios.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.portfolios.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-briefcase w-5"></i>
                    <span>Portfolios</span>
                </a>

                <a href="{{ route('admin.services.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.services.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-list-check w-5"></i>
                    <span>Services</span>
                </a>

                <a href="{{ route('admin.skills.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.skills.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-wand-magic-sparkles w-5"></i>
                    <span>Skills</span>
                </a>

                <a href="{{ route('admin.blogs.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.blogs.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper w-5"></i>
                    <span>Blogs</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-quote-left w-5"></i>
                    <span>Testimonials</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-envelope w-5"></i>
                    <span>Messages</span>
                    @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $unread }}</span>
                    @endif
                </a>

                <div class="pt-6 border-t border-gray-800 mt-6">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium text-sm text-gray-400 hover:text-white hover:bg-gray-800">
                        <i class="fa-solid fa-arrow-up-right-from-square w-5"></i>
                        <span>View Live Website</span>
                    </a>
                </div>
            </div>

            <!-- Admin Profile Quick Card -->
            <div class="p-4 border-t border-gray-800 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-indigo-500 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="text-xs">
                        <div class="font-semibold text-white">{{ Auth::user()->name ?? 'Admin' }}</div>
                        <div class="text-gray-400">{{ Auth::user()->email ?? 'admin@gmail.com' }}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 text-sm p-2" title="Logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navigation Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center gap-2 text-xs font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg">
                        <i class="fa-solid fa-globe"></i> Frontend Preview
                    </a>
                    
                    <div class="h-6 w-px bg-gray-200"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 text-sm text-red-600 font-semibold hover:bg-red-50 px-3 py-1.5 rounded-lg border border-red-200">
                            <i class="fa-solid fa-power-off"></i> Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content Body -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between">
                        <div class="flex items-center gap-3 text-emerald-800 font-medium">
                            <i class="fa-solid fa-circle-check text-xl text-emerald-600"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between">
                        <div class="flex items-center gap-3 text-rose-800 font-medium">
                            <i class="fa-solid fa-triangle-exclamation text-xl text-rose-600"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
