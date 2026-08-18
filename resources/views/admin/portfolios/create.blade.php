@extends('layouts.admin')

@section('title', 'Add Portfolio Project')
@section('page_title', 'Create Portfolio Item')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Add New Portfolio Project</h2>
            <p class="text-xs text-gray-500">Fill in the details to publish a new project to your portfolio</p>
        </div>
        <a href="{{ route('admin.portfolios.index') }}" class="text-xs text-gray-500 hover:text-gray-900 font-semibold">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Project Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="Analytics Dashboard">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="Web Design / App Design">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="Acme Inc.">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Project Live URL</label>
                <input type="url" name="project_url" value="{{ old('project_url') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="https://example.com">
            </div>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Short Overview</label>
            <textarea name="short_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="Brief summary of the project">{{ old('short_description') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Full Description</label>
            <textarea name="full_description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none" placeholder="Detailed project breakdown">{{ old('full_description') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Project Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <a href="{{ route('admin.portfolios.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-600 font-semibold rounded-xl text-sm hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md text-sm">Save Project</button>
        </div>
    </form>
</div>
@endsection
