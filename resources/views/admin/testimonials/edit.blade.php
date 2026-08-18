@extends('layouts.admin')

@section('title', 'Edit Testimonial')
@section('page_title', 'Edit Testimonial')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-900">Edit Client Review</h2>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back</a>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Designation</label>
                <input type="text" name="designation" value="{{ old('designation', $testimonial->designation) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Company</label>
                <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Rating (1 to 5 Stars)</label>
                <input type="number" name="rating" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Comment / Review</label>
            <textarea name="comment" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm outline-none">{{ old('comment', $testimonial->comment) }}</textarea>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Client Photo</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
            @if($testimonial->photo)
                <img src="{{ asset($testimonial->photo) }}" class="w-12 h-12 rounded-full object-cover border mt-2">
            @endif
        </div>
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md">Update Testimonial</button>
        </div>
    </form>
</div>
@endsection
