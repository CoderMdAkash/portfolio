@extends('layouts.admin')

@section('title', 'Edit Hero & About Info')
@section('page_title', 'Hero & About Info')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-900">Manage Hero & Personal Details</h2>
        <p class="text-xs text-gray-500">Update your name, bio, experience years, stats, and contact email displayed on the homepage.</p>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $about->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Professional Title</label>
                <input type="text" name="title" value="{{ old('title', $about->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $about->email) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Location</label>
                <input type="text" name="location" value="{{ old('location', $about->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Years Experience</label>
                <input type="number" name="exp_years" value="{{ old('exp_years', $about->exp_years) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Completed Projects</label>
                <input type="number" name="completed_projects" value="{{ old('completed_projects', $about->completed_projects) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Happy Clients</label>
                <input type="number" name="happy_clients" value="{{ old('happy_clients', $about->happy_clients) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Biography / Intro</label>
            <textarea name="bio" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 text-sm outline-none">{{ old('bio', $about->bio) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Profile / Hero Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
            @if($about->image)
                <div class="mt-3 flex items-center gap-4">
                    <img src="{{ asset($about->image) }}" alt="Current Image" class="w-16 h-16 rounded-xl object-cover border">
                    <span class="text-xs text-gray-500">Current Hero Image</span>
                </div>
            @endif
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/20 text-sm transition-all">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
