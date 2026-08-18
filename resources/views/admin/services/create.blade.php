@extends('layouts.admin')

@section('title', 'Add Service')
@section('page_title', 'Add New Service')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Add Service</h2>
        <a href="{{ route('admin.services.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back</a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Service Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Icon Class (FontAwesome)</label>
            <input type="text" name="icon" value="{{ old('icon', 'fa-solid fa-code') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none" placeholder="fa-solid fa-code">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Description</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">{{ old('description') }}</textarea>
        </div>
        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md">Save Service</button>
        </div>
    </form>
</div>
@endsection
