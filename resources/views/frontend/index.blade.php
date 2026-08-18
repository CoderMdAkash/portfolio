@extends('layouts.frontend')

@section('title', 'Md Akash Mia - Personal Portfolio')

@section('content')

<!-- 1a. Banner Slider Carousel (Swiper JS Powered with Visible FontAwesome Chevrons) -->
<section class="relative bg-gray-900 text-white overflow-hidden">
    <div class="swiper heroBannerSlider">
        <div class="swiper-wrapper">
            
            <!-- Slide 1 -->
            <div class="swiper-slide py-20 lg:py-28 relative bg-gradient-to-r from-purple-950 via-indigo-950 to-gray-900">
                <div class="max-w-[1320px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[380px]">
                    <div class="lg:col-span-8 space-y-6">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-purple-500/20 text-purple-300 font-semibold text-xs uppercase tracking-widest border border-purple-500/30">
                            Full-Stack Web Development
                        </span>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                            Building Scalable Web Applications
                        </h1>
                        <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                            Specializing in Laravel, React, Tailwind CSS, and cloud database architecture for high performance web systems.
                        </p>
                        <div class="pt-4 flex flex-wrap gap-4">
                            <a href="{{ route('service') }}" class="btn-primary-custom">
                                Explore Services <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ asset($about->cv_link ?? 'images/resume.pdf') }}" target="_blank" class="px-8 py-3.5 rounded-full border-2 border-white/80 font-semibold hover:bg-white hover:text-gray-900 transition-all">
                                <i class="fa-solid fa-download me-2"></i>Download Resume PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide py-20 lg:py-28 relative bg-gradient-to-r from-indigo-950 via-purple-950 to-gray-900">
                <div class="max-w-[1320px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[380px]">
                    <div class="lg:col-span-8 space-y-6">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/20 text-indigo-300 font-semibold text-xs uppercase tracking-widest border border-indigo-500/30">
                            UI/UX Visual Design
                        </span>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                            User-Centric Interactive Design
                        </h1>
                        <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                            Creating intuitive user interfaces, design systems, and responsive wireframes crafted for maximum user engagement.
                        </p>
                        <div class="pt-4 flex flex-wrap gap-4">
                            <a href="{{ route('portfolio') }}" class="btn-primary-custom">
                                View Portfolio <i class="fa-solid fa-briefcase ms-2"></i>
                            </a>
                            <a href="{{ route('about') }}" class="px-8 py-3.5 rounded-full border-2 border-white/80 font-semibold hover:bg-white hover:text-gray-900 transition-all">
                                Learn About Me
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide py-20 lg:py-28 relative bg-gradient-to-r from-slate-950 via-purple-950 to-gray-900">
                <div class="max-w-[1320px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[380px]">
                    <div class="lg:col-span-8 space-y-6">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 font-semibold text-xs uppercase tracking-widest border border-emerald-500/30">
                            100% Mobile Responsive
                        </span>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                            Engineered For All Screen Sizes
                        </h1>
                        <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                            Flawlessly tested across mobile, tablet, and desktop viewports using modern CSS frameworks like Tailwind CSS & Bootstrap.
                        </p>
                        <div class="pt-4 flex flex-wrap gap-4">
                            <a href="{{ route('contact') }}" class="btn-primary-custom">
                                Start Your Project <i class="fa-solid fa-paper-plane ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Carousel Pagination & Custom Chevron Buttons -->
        <div class="swiper-pagination !bottom-6"></div>
        
        <div class="absolute bottom-6 right-6 z-30 flex items-center gap-3">
            <button class="hero-prev w-12 h-12 rounded-full bg-white/20 hover:bg-purple-600 text-white flex items-center justify-center transition-all cursor-pointer shadow-lg focus:outline-none">
                <i class="fa-solid fa-chevron-left text-lg"></i>
            </button>
            <button class="hero-next w-12 h-12 rounded-full bg-white/20 hover:bg-purple-600 text-white flex items-center justify-center transition-all cursor-pointer shadow-lg focus:outline-none">
                <i class="fa-solid fa-chevron-right text-lg"></i>
            </button>
        </div>
    </div>
</section>

<!-- 1b. About Me Section -->
<section class="py-24 introduction-profile-background border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 flex justify-center">
                <div class="w-full max-w-md aspect-[536/636] relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-white">
                    <img src="{{ asset($about->image ?? 'images/akash.jpg') }}" alt="{{ $about->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">About Me</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
                    Hello, I'm <span class="bg-highlight">{{ $about->name }}</span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ $about->bio }}
                </p>

                <div class="grid grid-cols-3 gap-6 pt-6">
                    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <div class="text-3xl font-extrabold text-purple-600">{{ $about->exp_years }}+ Y.</div>
                        <div class="text-xs font-semibold text-gray-500 mt-1 uppercase">Experience</div>
                    </div>
                    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <div class="text-3xl font-extrabold text-purple-600">{{ $about->completed_projects }}+</div>
                        <div class="text-xs font-semibold text-gray-500 mt-1 uppercase">Projects Complete</div>
                    </div>
                    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <div class="text-3xl font-extrabold text-purple-600">{{ $about->happy_clients }}+</div>
                        <div class="text-xs font-semibold text-gray-500 mt-1 uppercase">Happy Clients</div>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <a href="{{ asset($about->cv_link ?? 'images/resume.pdf') }}" target="_blank" class="btn-primary-custom text-sm">
                        <i class="fa-solid fa-file-pdf me-2"></i>Download Resume PDF
                    </a>
                    <a href="{{ route('about') }}" class="text-purple-600 font-bold hover:underline inline-flex items-center gap-2 text-sm">
                        Read Full Biography &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 1c. Career Mission & Vision Section -->
<section class="py-24 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Purpose & Strategy</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Career Mission & Vision</h2>
            <p class="text-gray-500 text-sm">Guided by clear principles to deliver exceptional quality and innovation.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 p-8 rounded-3xl border border-purple-100 space-y-4">
                <div class="w-14 h-14 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-2xl font-bold">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Career Mission</h3>
                <p class="text-gray-700 leading-relaxed text-base">
                    {{ $about->mission ?? 'To craft clean, user-friendly, and modern web solutions that empower clients and businesses to succeed online.' }}
                </p>
            </div>

            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-8 rounded-3xl border border-indigo-100 space-y-4">
                <div class="w-14 h-14 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-2xl font-bold">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Career Vision</h3>
                <p class="text-gray-700 leading-relaxed text-base">
                    {{ $about->vision ?? 'To become a top-tier full-stack web developer and global freelance technology expert delivering world-class digital products.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 1d. Service List Section -->
<section class="py-24 bg-soft-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Our Expertise</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Services Offered</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl font-bold">
                        <i class="{{ $service->icon ?? 'fa-solid fa-wand-magic-sparkles' }}"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900">{{ $service->title }}</h4>
                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('service') }}" class="btn-primary-custom text-sm">
                View All Services & FAQs &rarr;
            </a>
        </div>
    </div>
</section>

<!-- 1e. Client Feedback Section -->
<section class="py-24 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Testimonials</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Client Feedback</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($testimonials as $t)
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 space-y-4">
                    <div class="flex items-center gap-1 text-amber-400">
                        @for($i=0; $i<$t->rating; $i++) <i class="fa-solid fa-star text-sm"></i> @endfor
                    </div>
                    <p class="text-gray-600 text-sm italic leading-relaxed">"{{ $t->comment }}"</p>
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
                        <img src="{{ asset($t->photo ?? 'assets/frontend/images/client-1.png') }}" alt="{{ $t->client_name }}" class="w-12 h-12 rounded-full object-cover border">
                        <div>
                            <div class="font-bold text-gray-900 text-sm">{{ $t->client_name }}</div>
                            <div class="text-xs text-gray-400">{{ $t->designation }} at {{ $t->company }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".heroBannerSlider", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".hero-next",
                prevEl: ".hero-prev",
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true
            }
        });
    });
</script>
@endpush
