@extends('layouts.admin')

@section('title', 'Edit Skill')
@section('page_title', 'Edit Skill')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Edit Skill</h2>
        <a href="{{ route('admin.skills.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back</a>
    </div>

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Skill Name</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category', $skill->category) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Proficiency (%)</label>
                <input type="number" name="percentage" value="{{ old('percentage', $skill->percentage) }}" min="1" max="100" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Icon Class (FontAwesome)</label>
            <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
        </div>
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md">Update Skill</button>
        </div>
    </form>
</div>
@endsection
