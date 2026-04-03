@extends('admin.layouts.master')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')
@section('page-subtitle', 'View messages from your website visitors')

@section('content')
<div class="max-w-7xl">
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow p-4 border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Total Messages</p>
            <p class="text-2xl font-bold text-gray-800">{{ $messages->total() }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 border-l-4 border-amber-500">
            <p class="text-gray-500 text-sm">Unread</p>
            <p class="text-2xl font-bold text-amber-600">{{ $unreadCount }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 border-l-4 border-green-500">
            <p class="text-gray-500 text-sm">Read</p>
            <p class="text-2xl font-bold text-green-600">{{ $messages->total() - $unreadCount }}</p>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($messages as $msg)
                    <tr class="{{ $msg->is_read ? '' : 'bg-blue-50/50' }}">
                        <td class="px-4 py-3">
                            @if(!$msg->is_read)
                                <span class="w-3 h-3 bg-blue-500 rounded-full inline-block" title="Unread"></span>
                            @else
                                <span class="w-3 h-3 bg-gray-300 rounded-full inline-block" title="Read"></span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-800 {{ $msg->is_read ? '' : 'font-bold' }}">{{ $msg->name }}</td>
                        <td class="px-4 py-3 text-gray-600 text-sm">{{ $msg->email }}</td>
                        <td class="px-4 py-3 text-gray-600 text-sm">{{ $msg->subject }}</td>
                        <td class="px-4 py-3 text-gray-500 text-sm">{{ $msg->created_at->format('M d, Y h:i A') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.contact-messages.show', $msg) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-2 block"></i>
                            No messages yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())
        <div class="p-4 border-t border-gray-200">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
