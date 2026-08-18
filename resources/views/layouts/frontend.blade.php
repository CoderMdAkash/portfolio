<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ mobileMenuOpen: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Md Akash Mia - Web Developer, Web Designer & Freelancer')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Tailwind CSS CDN & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'picto-primary': '#9929fb',
                        'picto-primary-dark': '#650fa0',
                        'soft-white': '#f0f1f3',
                        'soft-dark': '#87909d',
                    },
                    fontFamily: {
                        sans: ['Work Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Work Sans', sans-serif; }
        .bg-highlight { background-color: rgba(153, 41, 251, 0.15); padding: 0.1rem 0.4rem; border-radius: 0.375rem; color: #9929fb; }
        .introduction-profile-background {
            background: radial-gradient(circle at 12% 100%, #ffe2b0f5 1% 5px, transparent 15%),
                        radial-gradient(circle at 95% -15%, #da4df166 5%, transparent 30%),
                        radial-gradient(circle at center right, #c4f5e9b2 2%, transparent 35%);
        }
        .btn-primary-custom {
            background-color: #9929fb;
            color: #ffffff;
            border-radius: 9999px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .btn-primary-custom:hover {
            background-color: #650fa0;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(153, 41, 251, 0.4);
        }
        /* Custom Swiper Bullet Styling */
        .swiper-pagination-bullet { background: rgba(255, 255, 255, 0.5) !important; opacity: 1 !important; width: 10px !important; height: 10px !important; }
        .swiper-pagination-bullet-active { background: #9929fb !important; width: 28px !important; border-radius: 10px !important; }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased selection:bg-purple-500 selection:text-white flex flex-col min-h-screen">

    <!-- Responsive Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-[1320px] mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-bold text-2xl text-gray-900 tracking-tight">
                <span class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-indigo-500 text-white flex items-center justify-center font-black text-xl shadow-md">AM</span>
                <span>Akash Mia<span class="text-purple-600">.</span></span>
            </a>
            
            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-purple-600 transition-colors {{ request()->routeIs('home') ? 'text-purple-600 font-bold border-b-2 border-purple-600 pb-1' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="hover:text-purple-600 transition-colors {{ request()->routeIs('about') ? 'text-purple-600 font-bold border-b-2 border-purple-600 pb-1' : '' }}">About</a>
                <a href="{{ route('portfolio') }}" class="hover:text-purple-600 transition-colors {{ request()->routeIs('portfolio') ? 'text-purple-600 font-bold border-b-2 border-purple-600 pb-1' : '' }}">Portfolio</a>
                <a href="{{ route('service') }}" class="hover:text-purple-600 transition-colors {{ request()->routeIs('service') ? 'text-purple-600 font-bold border-b-2 border-purple-600 pb-1' : '' }}">Services</a>
                <a href="{{ route('contact') }}" class="hover:text-purple-600 transition-colors {{ request()->routeIs('contact') ? 'text-purple-600 font-bold border-b-2 border-purple-600 pb-1' : '' }}">Contact</a>
            </nav>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}" class="btn-primary-custom text-sm py-2 px-5 hidden sm:inline-block">
                    Order Service
                </a>
                <a href="{{ route('login') }}" class="text-xs text-gray-400 hover:text-purple-600 font-semibold px-2 py-1 rounded border border-gray-200" title="Admin Login">
                    <i class="fa-solid fa-lock me-1"></i>Admin
                </a>
                
                <!-- Mobile Hamburger Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 hover:text-purple-600 text-2xl focus:outline-none p-1">
                    <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-b border-gray-200 px-6 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block font-medium py-2 {{ request()->routeIs('home') ? 'text-purple-600 font-bold' : 'text-gray-700' }}">Home</a>
            <a href="{{ route('about') }}" class="block font-medium py-2 {{ request()->routeIs('about') ? 'text-purple-600 font-bold' : 'text-gray-700' }}">About</a>
            <a href="{{ route('portfolio') }}" class="block font-medium py-2 {{ request()->routeIs('portfolio') ? 'text-purple-600 font-bold' : 'text-gray-700' }}">Portfolio</a>
            <a href="{{ route('service') }}" class="block font-medium py-2 {{ request()->routeIs('service') ? 'text-purple-600 font-bold' : 'text-gray-700' }}">Services</a>
            <a href="{{ route('contact') }}" class="block font-medium py-2 {{ request()->routeIs('contact') ? 'text-purple-600 font-bold' : 'text-gray-700' }}">Contact</a>
        </div>
    </header>

    <!-- Main Yield Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer with Live Date & Time -->
    <footer class="bg-[#2A374A] text-white py-16 mt-auto">
        <div class="max-w-[1320px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-gray-700 pb-12">
                <div>
                    <h3 class="text-2xl font-bold mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-purple-500 text-white flex items-center justify-center font-bold text-sm">AM</span>
                        Md Akash Mia
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Web Developer, Web Designer & Freelancer building immersive, responsive, and secure web applications.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4 text-purple-300">Quick Navigation</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Me</a></li>
                        <li><a href="{{ route('portfolio') }}" class="hover:text-white transition-colors">Portfolio & Experience</a></li>
                        <li><a href="{{ route('service') }}" class="hover:text-white transition-colors">Services & FAQs</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Me</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4 text-purple-300">System Time</h4>
                    <div class="bg-gray-800/80 p-4 rounded-2xl border border-gray-700/60 mb-4">
                        <div class="text-xs text-gray-400 mb-1">Live Server Clock:</div>
                        <div id="live-datetime" class="font-mono text-purple-400 font-bold text-sm">Loading Clock...</div>
                    </div>
                    <div class="flex gap-4">
                        <a href="mailto:akash904069@gmail.com" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-purple-600 text-white flex items-center justify-center transition-colors"><i class="fa-solid fa-envelope text-sm"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-purple-600 text-white flex items-center justify-center transition-colors"><i class="fa-brands fa-github text-sm"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-purple-600 text-white flex items-center justify-center transition-colors"><i class="fa-brands fa-linkedin-in text-sm"></i></a>
                    </div>
                </div>
            </div>

            <div class="pt-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} Md Akash Mia. All Rights Reserved. Built according to NSDA Assessment Specifications.
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- External JS File for Clock & Validation -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
