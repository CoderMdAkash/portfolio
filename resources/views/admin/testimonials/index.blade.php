@extends('layouts.admin')

@section('title', 'Testimonials')
@section('page_title', 'Client Testimonials')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Client Reviews</h2>
            <p class="text-xs text-gray-500">Manage client reviews and ratings</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow-md flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add Testimonial
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4">Client</th>
                    <th class="px-6 py-4">Designation / Company</th>
                    <th class="px-6 py-4">Rating</th>
                    <th class="px-6 py-4">Review</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($testimonials as $item)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4 font-semibold text-gray-900 flex items-center gap-3">
                            <img src="{{ asset($item->photo ?? 'assets/frontend/images/client-1.png') }}" class="w-9 h-9 rounded-full object-cover border">
                            <span>{{ $item->client_name }}</span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-500">{{ $item->designation ?? 'Client' }} ({{ $item->company ?? 'Company' }})</td>
                        <td class="px-6 py-4 text-amber-500 font-bold">
                            @for($i=0; $i<$item->rating; $i++) <i class="fa-solid fa-star text-xs"></i> @endfor
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-500 max-w-xs truncate">{{ $item->comment }}</td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                            <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="text-indigo-600 font-semibold text-xs"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete testimonial?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold text-xs"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">No testimonials added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
