@extends('layouts.admin')

@section('title', 'Admin Dashboard Overview')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    <!-- Top Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Metric Card 1: Total Portfolios -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Portfolios</div>
                <div class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['portfolios'] }}</div>
                <div class="text-xs text-indigo-600 font-medium mt-2">Active Projects</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-briefcase"></i>
            </div>
        </div>

        <!-- Metric Card 2: Services Offered -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Services</div>
                <div class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['services'] }}</div>
                <div class="text-xs text-emerald-600 font-medium mt-2">Offered Solutions</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-list-check"></i>
            </div>
        </div>

        <!-- Metric Card 3: Skills -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Skills & Tools</div>
                <div class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['skills'] }}</div>
                <div class="text-xs text-purple-600 font-medium mt-2">Tech Competencies</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>
        </div>

        <!-- Metric Card 4: Unread Messages -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Unread Messages</div>
                <div class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['unread_messages'] }}</div>
                <div class="text-xs text-amber-600 font-medium mt-2">Pending Inquiries</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
        </div>

    </div>

    <!-- Main Content Split Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Recent Contact Inquiries Table (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-lg">Recent Contact Messages</h3>
                    <p class="text-xs text-gray-500">Inquiries sent directly from your website contact form</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-indigo-600 hover:underline">
                    View All Inbox &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3">Sender</th>
                            <th class="px-6 py-3">Subject</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentMessages as $msg)
                            <tr class="hover:bg-gray-50/80 transition-colors {{ !$msg->is_read ? 'font-semibold bg-indigo-50/30' : '' }}">
                                <td class="px-6 py-4">
                                    <div class="text-gray-900 font-medium">{{ $msg->name }}</div>
                                    <div class="text-xs text-gray-400 font-normal">{{ $msg->email }}</div>
                                </td>
                                <td class="px-6 py-4 max-w-xs truncate">{{ $msg->subject }}</td>
                                <td class="px-6 py-4 text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-xs text-indigo-600 hover:text-indigo-900 font-semibold">
                                        Read
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-400 text-sm">
                                    No contact messages received yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions & Status (1 Col) -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 text-lg mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.portfolios.create') }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold text-sm transition-colors">
                        <span><i class="fa-solid fa-plus me-2"></i> Add New Portfolio</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold text-sm transition-colors">
                        <span><i class="fa-solid fa-plus me-2"></i> Add Service</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                    <a href="{{ route('admin.skills.create') }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold text-sm transition-colors">
                        <span><i class="fa-solid fa-plus me-2"></i> Add Skill</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                    <a href="{{ route('admin.about.edit') }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-700 font-semibold text-sm transition-colors">
                        <span><i class="fa-solid fa-pen-to-square me-2"></i> Edit Hero & About</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
