@extends('layouts.frontend')

@section('title', $portfolio->title . ' - Portfolio Details')

@section('content')
<div class="py-16 bg-soft-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <a href="{{ route('home') }}#portfolio" class="text-sm font-semibold text-purple-600 hover:underline mb-4 inline-block">&larr; Back to Portfolios</a>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">{{ $portfolio->title }}</h1>
        <span class="inline-block mt-2 px-3 py-1 bg-purple-100 text-purple-700 font-semibold text-xs rounded-full uppercase">{{ $portfolio->category }}</span>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-[1320px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-8 space-y-8">
            <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 aspect-[16/10]">
                <img src="{{ asset($portfolio->image ?? 'assets/frontend/images/portfolio-1.png') }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
            </div>
            
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-gray-900">Project Overview</h2>
                <p class="text-gray-600 leading-relaxed">{{ $portfolio->full_description ?? $portfolio->short_description }}</p>
            </div>
        </div>

        <div class="lg:col-span-4">
            <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 space-y-6">
                <h3 class="font-bold text-gray-900 text-lg border-b border-gray-200 pb-4">Project Meta</h3>
                
                <div class="space-y-4 text-sm">
                    <div>
                        <div class="text-xs text-gray-400 uppercase font-semibold">Client</div>
                        <div class="font-bold text-gray-800">{{ $portfolio->client_name ?? 'N/A' }}</div>
                    </div>

                    <div>
                        <div class="text-xs text-gray-400 uppercase font-semibold">Category</div>
                        <div class="font-bold text-gray-800">{{ $portfolio->category }}</div>
                    </div>

                    @if($portfolio->project_url)
                        <div class="pt-4 border-t border-gray-200">
                            <a href="{{ $portfolio->project_url }}" target="_blank" class="w-full btn-primary-custom text-center block">
                                Visit Live Website <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
