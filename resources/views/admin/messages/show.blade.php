@extends('layouts.admin')

@section('title', 'View Message')
@section('page_title', 'Message Details')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-gray-100 pb-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900">{{ $message->subject }}</h2>
            <div class="text-xs text-gray-500 mt-1">Received {{ $message->created_at->format('F d, Y \a\t h:i A') }}</div>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-xs text-gray-500 font-semibold">&larr; Back to Inbox</a>
    </div>

    <div class="bg-gray-50 p-4 rounded-xl space-y-2 border border-gray-100 text-sm">
        <div><span class="font-semibold text-gray-700">From:</span> {{ $message->name }} &lt;{{ $message->email }}&gt;</div>
        <div><span class="font-semibold text-gray-700">Email:</span> <a href="mailto:{{ $message->email }}" class="text-indigo-600 underline">{{ $message->email }}</a></div>
    </div>

    <div class="space-y-2">
        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Message Content</label>
        <div class="p-6 bg-white rounded-xl border border-gray-200 text-gray-800 text-sm leading-relaxed whitespace-pre-line">
            {{ $message->message }}
        </div>
    </div>

    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Delete message?');">
            @csrf @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-600 font-semibold rounded-xl text-xs hover:bg-rose-100">
                <i class="fa-solid fa-trash me-1"></i> Delete Message
            </button>
        </form>

        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl text-sm shadow-md inline-flex items-center gap-2">
            <i class="fa-solid fa-reply"></i> Reply via Email
        </a>
    </div>
</div>
@endsection
