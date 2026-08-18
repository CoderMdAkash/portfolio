@extends('layouts.frontend')

@section('title', 'Services & FAQ - Personal Portfolio')

@section('content')

<!-- 4a. Page Title Section -->
<section class="py-16 bg-gray-900 text-white border-b border-gray-800">
    <div class="max-w-[1320px] mx-auto px-4 text-center space-y-3">
        <span class="text-purple-400 font-bold text-xs uppercase tracking-widest">Offered Solutions</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold">Services & FAQ</h1>
        <p class="text-gray-400 text-sm max-w-xl mx-auto">Explore all digital services offered, client testimonials, and frequently asked questions.</p>
    </div>
</section>

<!-- 4b. All Service Grid Section -->
<section class="py-24 bg-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Service Catalog</span>
            <h2 class="text-3xl font-bold text-gray-900">All Service Grid Section</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($services as $service)
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 space-y-4 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold">
                        <i class="{{ $service->icon ?? 'fa-solid fa-wand-magic-sparkles' }}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $service->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $service->description }}</p>
                    <a href="{{ route('contact') }}" class="text-purple-600 font-bold text-xs hover:underline inline-block">
                        Order This Service &rarr;
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 4c. Client Section -->
<section class="py-20 bg-soft-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Client Reviews</span>
            <h2 class="text-3xl font-bold text-gray-900">Client Feedback Section</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($testimonials as $t)
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-4">
                    <div class="flex items-center gap-1 text-amber-400">
                        @for($i=0; $i<$t->rating; $i++) <i class="fa-solid fa-star text-sm"></i> @endfor
                    </div>
                    <p class="text-gray-600 text-sm italic leading-relaxed">"{{ $t->comment }}"</p>
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                        <img src="{{ asset($t->photo ?? 'assets/frontend/images/client-1.png') }}" alt="{{ $t->client_name }}" class="w-10 h-10 rounded-full object-cover border">
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

<!-- 4d. FAQ Section with 5 Questions & Answers using Accordion -->
<section class="py-24 bg-white" x-data="{ activeFaq: 1 }">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Got Questions?</span>
            <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
            <p class="text-gray-500 text-sm">5 key questions & answers regarding my web development and design services.</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            @foreach($faqs as $index => $faq)
                @php $id = $index + 1; @endphp
                <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === {{ $id }} ? null : {{ $id }})" class="w-full text-left p-6 font-bold text-gray-900 text-base flex items-center justify-between focus:outline-none">
                        <span>{{ $id }}. {{ $faq->question }}</span>
                        <i class="fa-solid" :class="activeFaq === {{ $id }} ? 'fa-chevron-up text-purple-600' : 'fa-chevron-down text-gray-400'"></i>
                    </button>

                    <div x-show="activeFaq === {{ $id }}" x-transition class="p-6 pt-0 text-sm text-gray-600 leading-relaxed border-t border-gray-100 bg-white">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
