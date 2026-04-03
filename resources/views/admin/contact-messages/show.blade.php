@extends('admin.layouts.master')

@section('title', 'View Message')
@section('page-title', 'View Message')
@section('page-subtitle', 'Message from ' . $contactMessage->name)

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium mb-6">
        <i class="fas fa-arrow-left"></i> Back to Messages
    </a>

    <div class="bg-white rounded-xl shadow p-6">
        <!-- Header -->
        <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-200">
            <div>
                <h2 class="text-xl font-bold text-gray-800">{{ $contactMessage->subject }}</h2>
                <p class="text-gray-500 text-sm mt-1">Received {{ $contactMessage->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>
            <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>

        <!-- Sender Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Name</p>
                <p class="text-sm font-bold text-gray-800">{{ $contactMessage->name }}</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                <a href="mailto:{{ $contactMessage->email }}" class="text-sm font-bold text-blue-600 hover:underline">{{ $contactMessage->email }}</a>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                @if($contactMessage->phone)
                    <a href="tel:{{ $contactMessage->phone }}" class="text-sm font-bold text-blue-600 hover:underline">{{ $contactMessage->phone }}</a>
                @else
                    <p class="text-sm text-gray-400">Not provided</p>
                @endif
            </div>
        </div>

        <!-- Message Body -->
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Message</p>
            <div class="bg-gray-50 rounded-lg p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $contactMessage->message }}</div>
        </div>

        <!-- Quick Reply -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-medium text-sm transition-colors inline-flex items-center gap-2">
                <i class="fas fa-reply"></i> Reply via Email
            </a>
        </div>
    </div>
</div>
@endsection
