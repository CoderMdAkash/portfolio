@extends('layouts.frontend')

@section('title', $blog->title . ' - Blog')

@section('content')
<div class="py-16 bg-soft-white border-b border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <a href="{{ route('home') }}#blog" class="text-sm font-semibold text-purple-600 hover:underline mb-4 inline-block">&larr; Back to Articles</a>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">{{ $blog->title }}</h1>
        <div class="mt-3 flex items-center gap-4 text-xs text-gray-500">
            <span class="px-3 py-1 bg-purple-100 text-purple-700 font-semibold rounded-full uppercase">{{ $blog->category }}</span>
            <span>Published {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recently' }}</span>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 space-y-8">
        <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 aspect-[16/9]">
            <img src="{{ asset($blog->image ?? 'assets/frontend/images/blog-1.png') }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
        </div>
        
        <div class="prose max-w-none text-gray-700 leading-relaxed text-base">
            {{ $blog->content }}
        </div>
    </div>
</div>
@endsection
