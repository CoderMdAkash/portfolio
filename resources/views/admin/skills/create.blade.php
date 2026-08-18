@extends('layouts.admin')

@section('title', 'Add Skill')
@section('page_title', 'Add New Skill')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Add Skill</h2>
        <a href="{{ route('admin.skills.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back</a>
    </div>

    <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Skill Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none" placeholder="PHP / Laravel">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category', 'Backend') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none" placeholder="Design / Frontend / Backend">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Proficiency (%)</label>
                <input type="number" name="percentage" value="{{ old('percentage', 90) }}" min="1" max="100" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Icon Class (FontAwesome)</label>
            <input type="text" name="icon" value="{{ old('icon', 'fa-brands fa-laravel') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none" placeholder="fa-brands fa-laravel">
        </div>
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md">Save Skill</button>
        </div>
    </form>
</div>
@endsection
