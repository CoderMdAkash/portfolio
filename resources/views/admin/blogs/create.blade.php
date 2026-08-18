@extends('layouts.admin')

@section('title', 'Write Blog Post')
@section('page_title', 'Create Blog Post')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Create Blog Article</h2>
        <a href="{{ route('admin.blogs.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back</a>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category', 'Design') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Excerpt</label>
            <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">{{ old('excerpt') }}</textarea>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Content</label>
            <textarea name="content" rows="6" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">{{ old('content') }}</textarea>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Cover Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
        </div>
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md">Publish Post</button>
        </div>
    </form>
</div>
@endsection
