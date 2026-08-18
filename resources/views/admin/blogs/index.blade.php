@extends('layouts.admin')

@section('title', 'Manage Blogs')
@section('page_title', 'Blogs Management')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Blog Articles</h2>
            <p class="text-xs text-gray-500">Manage published articles and news</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow-md flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Write Blog Post
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4">Thumbnail</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Published Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($blogs as $blog)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4">
                            <img src="{{ asset($blog->image ?? 'assets/frontend/images/blog-1.png') }}" alt="{{ $blog->title }}" class="w-14 h-10 rounded-lg object-cover border">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $blog->title }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $blog->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">
                            {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') : 'Draft' }}
                        </td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-indigo-600 font-semibold text-xs"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Delete article?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold text-xs"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">No blog posts found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-gray-100">{{ $blogs->links() }}</div>
    </div>
</div>
@endsection
