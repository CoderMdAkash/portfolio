@extends('layouts.admin')

@section('title', 'Manage Portfolios')
@section('page_title', 'Portfolios Management')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Portfolios Showcase</h2>
            <p class="text-xs text-gray-500">Manage your featured projects and client work showcase</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow-md transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add New Portfolio
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Project Title</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($portfolios as $portfolio)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <img src="{{ asset($portfolio->image ?? 'assets/frontend/images/portfolio-1.png') }}" alt="{{ $portfolio->title }}" class="w-14 h-10 rounded-lg object-cover border">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $portfolio->title }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                    {{ $portfolio->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-500">{{ $portfolio->client_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                                <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold text-xs">
                                    <i class="fa-solid fa-pen-to-square me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-900 font-semibold text-xs">
                                        <i class="fa-solid fa-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">
                                No portfolio projects created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-gray-100">
            {{ $portfolios->links() }}
        </div>
    </div>

</div>
@endsection
