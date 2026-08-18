@extends('layouts.admin')

@section('title', 'Contact Messages Inbox')
@section('page_title', 'Contact Inbox')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-gray-900">Received Messages</h2>
        <p class="text-xs text-gray-500">Inquiries submitted by website visitors</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4">Sender</th>
                    <th class="px-6 py-4">Subject</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($messages as $msg)
                    <tr class="hover:bg-gray-50/80 transition-colors {{ !$msg->is_read ? 'font-semibold bg-indigo-50/20' : '' }}">
                        <td class="px-6 py-4">
                            <div class="text-gray-900 font-medium">{{ $msg->name }}</div>
                            <div class="text-xs text-gray-400 font-normal">{{ $msg->email }}</div>
                        </td>
                        <td class="px-6 py-4 max-w-xs truncate">{{ $msg->subject }}</td>
                        <td class="px-6 py-4">
                            @if($msg->is_read)
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">Read</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">Unread</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">{{ $msg->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-indigo-600 font-semibold text-xs"><i class="fa-solid fa-eye me-1"></i>View</a>
                            <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete message?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold text-xs"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">No messages received yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-gray-100">{{ $messages->links() }}</div>
    </div>
</div>
@endsection
