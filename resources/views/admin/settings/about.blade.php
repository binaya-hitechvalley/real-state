@extends('admin.layouts.master')

@section('title', 'About Page Settings')
@section('page-title', 'About Page Settings')
@section('page-subtitle', 'Manage your About page content')

@section('content')
<div class="max-w-5xl">
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.about.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hero Section -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-star text-blue-500"></i> Hero Section
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="about_hero_title" value="{{ $settings['about_hero_title'] ?? 'Building Trust in Real Estate Investment' }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea name="about_hero_subtitle" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['about_hero_subtitle'] ?? "Sapphire Investment is Nepal's premier real estate consultancy, helping investors and families find verified, high-potential properties across the country." }}</textarea>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-chart-bar text-green-500"></i> Statistics Bar
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 1; $i <= 4; $i++)
                <div class="border border-gray-200 rounded-lg p-4">
                    <p class="text-sm font-semibold text-gray-500 mb-2">Stat {{ $i }}</p>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Value</label>
                            <input type="text" name="about_stat_{{ $i }}_value" value="{{ $settings['about_stat_'.$i.'_value'] ?? '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="e.g. 500+">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Label</label>
                            <input type="text" name="about_stat_{{ $i }}_label" value="{{ $settings['about_stat_'.$i.'_label'] ?? '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="e.g. Properties Sold">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Story Section -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-book-open text-indigo-500"></i> Our Story
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Story Title</label>
                    <input type="text" name="about_story_title" value="{{ $settings['about_story_title'] ?? "Transforming Nepal's Real Estate Landscape" }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Story Content</label>
                    <textarea name="about_story_content" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['about_story_content'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Mission, Vision, Values -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-bullseye text-purple-500"></i> Mission, Vision & Values
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Our Mission</label>
                    <textarea name="about_mission" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['about_mission'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Our Vision</label>
                    <textarea name="about_vision" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['about_vision'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Our Values</label>
                    <textarea name="about_values" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $settings['about_values'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Team Members -->
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-users text-cyan-500"></i> Team Members
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 1; $i <= 4; $i++)
                <div class="border border-gray-200 rounded-lg p-4">
                    <p class="text-sm font-semibold text-gray-500 mb-2">Team Member {{ $i }}</p>
                    <div class="space-y-2">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Name</label>
                            <input type="text" name="about_team_member_{{ $i }}_name" value="{{ $settings['about_team_member_'.$i.'_name'] ?? '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="Full Name">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Role</label>
                            <input type="text" name="about_team_member_{{ $i }}_role" value="{{ $settings['about_team_member_'.$i.'_role'] ?? '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="e.g. Founder & CEO">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition-colors">
            <i class="fas fa-save mr-2"></i> Save About Page Settings
        </button>
    </form>
</div>
@endsection
