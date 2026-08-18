@extends('layouts.frontend')

@section('title', 'Portfolio & Qualifications - Personal Portfolio')

@section('content')

<!-- 3a. Page Title Section -->
<section class="py-16 bg-gray-900 text-white border-b border-gray-800">
    <div class="max-w-[1320px] mx-auto px-4 text-center space-y-3">
        <span class="text-purple-400 font-bold text-xs uppercase tracking-widest">Professional Resume & Showcase</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold">Portfolio & Qualifications</h1>
        <p class="text-gray-400 text-sm max-w-xl mx-auto">Explore personal credentials, education, certifications, special skills, and work history.</p>
    </div>
</section>

<!-- 3b. Personal Information Section -->
<section class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-soft-white p-8 rounded-3xl border border-gray-100 space-y-6">
            <h2 class="text-2xl font-bold text-gray-900 border-b border-gray-200 pb-4">Personal Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-sm">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Full Name</span>
                    <div class="font-bold text-gray-900 mt-1">{{ $about->name }}</div>
                </div>
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Professional Title</span>
                    <div class="font-bold text-gray-900 mt-1">{{ $about->title }}</div>
                </div>
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Email Address</span>
                    <div class="font-bold text-gray-900 mt-1">{{ $about->email }}</div>
                </div>
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Location</span>
                    <div class="font-bold text-gray-900 mt-1">{{ $about->location }}</div>
                </div>
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Phone</span>
                    <div class="font-bold text-gray-900 mt-1">{{ $about->phone ?? '+44 123 456 789' }}</div>
                </div>
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Experience</span>
                    <div class="font-bold text-purple-600 mt-1">{{ $about->exp_years }} Years</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3c. Education Information Section -->
<section class="py-20 bg-soft-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Academic Background</span>
            <h2 class="text-3xl font-bold text-gray-900">Education Information</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($educations as $edu)
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold px-3 py-1 bg-purple-100 text-purple-700 rounded-full">{{ $edu->year }}</span>
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">{{ $edu->result }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $edu->degree }}</h3>
                    <div class="text-sm font-semibold text-gray-600">{{ $edu->institution }}</div>
                    <p class="text-xs text-gray-500 leading-relaxed">{{ $edu->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 3d. Special Skill Section -->
<section class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Special Competencies</span>
            <h2 class="text-3xl font-bold text-gray-900">Special Skill Section</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($skills as $skill)
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-center space-y-3 hover:bg-purple-50 transition-colors">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 mx-auto flex items-center justify-center text-xl">
                        <i class="{{ $skill->icon ?? 'fa-solid fa-code' }}"></i>
                    </div>
                    <div class="font-bold text-gray-900 text-sm">{{ $skill->name }}</div>
                    <div class="text-xs font-semibold text-purple-600">{{ $skill->percentage }}% Mastery</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 3e. Training Certification Section (using Modal) -->
<section class="py-20 bg-soft-white border-b border-gray-100" x-data="{ modalOpen: false, selectedCert: null }">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Accreditations</span>
            <h2 class="text-3xl font-bold text-gray-900">Training Certification Section</h2>
            <p class="text-gray-500 text-sm">Click on any certification to view detailed accreditation popup modal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($certifications as $cert)
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full">{{ $cert->year }}</span>
                        <i class="fa-solid fa-award text-amber-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $cert->title }}</h3>
                    <div class="text-xs font-semibold text-gray-500">{{ $cert->institution }}</div>
                    
                    <button @click="selectedCert = {{ json_encode($cert) }}; modalOpen = true" class="px-4 py-2 bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold rounded-xl text-xs transition-colors">
                        View Certification Modal &rarr;
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Certification Modal Popup -->
    <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;">
        <div @click.away="modalOpen = false" class="bg-white max-w-lg w-full rounded-3xl shadow-2xl p-8 space-y-6 relative border border-gray-100">
            <button @click="modalOpen = false" class="absolute top-6 right-6 text-gray-400 hover:text-gray-900 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="w-16 h-16 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-3xl font-bold">
                <i class="fa-solid fa-certificate"></i>
            </div>

            <div>
                <h3 class="text-2xl font-bold text-gray-900" x-text="selectedCert?.title"></h3>
                <div class="text-sm text-purple-600 font-semibold mt-1" x-text="selectedCert?.institution + ' (' + selectedCert?.year + ')'"></div>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed" x-text="selectedCert?.details"></p>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button @click="modalOpen = false" class="btn-primary-custom text-xs py-2 px-6">
                    Close Modal
                </button>
            </div>
        </div>
    </div>
</section>

<!-- 3f. Working Experience Section -->
<section class="py-20 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Career History</span>
            <h2 class="text-3xl font-bold text-gray-900">Working Experience Section</h2>
        </div>

        <div class="max-w-4xl mx-auto space-y-8">
            @foreach($experiences as $exp)
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full">{{ $exp->duration }}</span>
                        <span class="text-xs text-gray-400 font-semibold">{{ $exp->company }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $exp->designation }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $exp->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
