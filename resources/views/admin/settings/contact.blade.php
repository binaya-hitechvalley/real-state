@extends('admin.layouts.master')

@section('title', 'Contact Page Settings')
@section('page-title', 'Contact Page Settings')
@section('page-subtitle', 'Manage your Contact page information')

@section('content')
<div class="max-w-5xl">
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.contact.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Contact Information -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-phone-alt text-emerald-500"></i> Contact Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+977 9851056272' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'info@sapphireinvestment.com' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Office Address</label>
                    <input type="text" name="contact_address" value="{{ $settings['contact_address'] ?? 'Kamaladi-28, Kathmandu, Nepal' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Working Hours -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-clock text-amber-500"></i> Working Hours
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weekday Hours</label>
                    <input type="text" name="contact_working_hours_weekday" value="{{ $settings['contact_working_hours_weekday'] ?? 'Sunday - Friday: 9:00 AM - 6:00 PM' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Saturday Hours</label>
                    <input type="text" name="contact_working_hours_saturday" value="{{ $settings['contact_working_hours_saturday'] ?? 'Saturday: 10:00 AM - 4:00 PM' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-map text-red-500"></i> Google Map Embed URL
            </h3>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Map Embed URL (paste the src from Google Maps embed iframe)</label>
                <input type="text" name="contact_map_embed" value="{{ $settings['contact_map_embed'] ?? '' }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="https://www.google.com/maps/embed?pb=...">
                <p class="text-xs text-gray-500 mt-1">Go to Google Maps → Share → Embed a Map → Copy the src URL from the iframe code.</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-share-alt text-indigo-500"></i> Social Media Links
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-facebook text-blue-600 mr-1"></i> Facebook URL</label>
                    <input type="url" name="contact_facebook" value="{{ $settings['contact_facebook'] ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-instagram text-pink-600 mr-1"></i> Instagram URL</label>
                    <input type="url" name="contact_instagram" value="{{ $settings['contact_instagram'] ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-linkedin text-blue-700 mr-1"></i> LinkedIn URL</label>
                    <input type="url" name="contact_linkedin" value="{{ $settings['contact_linkedin'] ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="https://linkedin.com/...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-whatsapp text-green-600 mr-1"></i> WhatsApp Number</label>
                    <input type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="9779851056272">
                </div>
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition-colors">
            <i class="fas fa-save mr-2"></i> Save Contact Page Settings
        </button>
    </form>
</div>
@endsection
