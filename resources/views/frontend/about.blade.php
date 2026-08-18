@extends('layouts.frontend')

@section('title', 'About Me - Md Akash Mia')

@section('content')

<!-- 2a. Page Title Section -->
<section class="py-16 bg-gray-900 text-white border-b border-gray-800">
    <div class="max-w-[1320px] mx-auto px-4 text-center space-y-3">
        <span class="text-purple-400 font-bold text-xs uppercase tracking-widest">Get To Know Me</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold">About Me & Biography</h1>
        <p class="text-gray-400 text-sm max-w-xl mx-auto">Learn more about my background, career mission, skills, and existing client partnerships.</p>
    </div>
</section>

<!-- 2b. Personal Biography Section -->
<section class="py-24 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 flex justify-center">
                <div class="w-full max-w-md aspect-[536/636] rounded-3xl overflow-hidden shadow-2xl border-4 border-gray-100 bg-white">
                    <img src="{{ asset($about->image ?? 'images/akash.jpg') }}" alt="{{ $about->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Personal Biography</span>
                <h2 class="text-3xl font-bold text-gray-900">
                    I'm {{ $about->name }}, a {{ $about->title }} based in {{ $about->location }}.
                </h2>
                <p class="text-gray-600 leading-relaxed text-base">
                    {{ $about->bio }}
                </p>
                <p class="text-gray-600 leading-relaxed text-base">
                    Over the past {{ $about->exp_years }}+ years, I have completed {{ $about->completed_projects }}+ successful projects for startups, corporate clients, and agency partners, creating modern digital products that blend clean design with robust code.
                </p>

                <div class="grid grid-cols-2 gap-4 pt-4 text-sm font-semibold">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-purple-600"></i>
                        <span>{{ $about->email }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-location-dot text-purple-600"></i>
                        <span>{{ $about->location }}</span>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="{{ asset($about->cv_link ?? 'images/resume.pdf') }}" target="_blank" class="btn-primary-custom text-sm">
                        <i class="fa-solid fa-download me-2"></i>Download Resume PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2c. Existing Client Section -->
<section class="py-20 bg-soft-white border-y border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Partnerships</span>
            <h2 class="text-3xl font-bold text-gray-900">Existing Clients & Partners</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 items-center">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm text-center font-bold text-gray-400 text-lg hover:text-purple-600 transition-colors">
                ACME Corp
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm text-center font-bold text-gray-400 text-lg hover:text-purple-600 transition-colors">
                Shopify Partner
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm text-center font-bold text-gray-400 text-lg hover:text-purple-600 transition-colors">
                NextGen AI
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm text-center font-bold text-gray-400 text-lg hover:text-purple-600 transition-colors">
                InnovateX
            </div>
        </div>
    </div>
</section>

<!-- 2d. Skill Information Section -->
<section class="py-24 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Technical Proficiency</span>
            <h2 class="text-3xl font-bold text-gray-900">Skill Information</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($skills as $skill)
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-gray-900 flex items-center gap-3">
                            <i class="{{ $skill->icon ?? 'fa-solid fa-code' }} text-purple-600 text-xl"></i>
                            {{ $skill->name }}
                        </span>
                        <span class="text-sm font-bold text-purple-600">{{ $skill->percentage }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
