@extends('layouts.admin')

@section('title', 'Manage Services')
@section('page_title', 'Services Offered')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Services Offered</h2>
            <p class="text-xs text-gray-500">Manage client services, features, and icons</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow-md flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add Service
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4">Icon</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($services as $service)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4">
                            <span class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg">
                                <i class="{{ $service->icon ?? 'fa-solid fa-gear' }}"></i>
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $service->title }}</td>
                        <td class="px-6 py-4 text-xs text-gray-500 max-w-sm truncate">{{ $service->description }}</td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="text-indigo-600 font-semibold text-xs"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Delete service?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold text-xs"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-8 text-center text-gray-400 text-sm">No services added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
