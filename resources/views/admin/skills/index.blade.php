@extends('layouts.admin')

@section('title', 'Manage Skills')
@section('page_title', 'Skills & Competencies')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Skills & Tech Stack</h2>
            <p class="text-xs text-gray-500">Manage technical skills, proficiency percentages, and categories</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow-md flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add Skill
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4">Skill Name</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Proficiency</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($skills as $skill)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4 font-semibold text-gray-900 flex items-center gap-3">
                            <i class="{{ $skill->icon ?? 'fa-solid fa-code' }} text-purple-600 text-lg"></i>
                            <span>{{ $skill->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-100">
                                {{ $skill->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 max-w-xs">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                </div>
                                <span class="text-xs font-bold text-gray-700">{{ $skill->percentage }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="text-indigo-600 font-semibold text-xs"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Delete skill?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold text-xs"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-8 text-center text-gray-400 text-sm">No skills added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
