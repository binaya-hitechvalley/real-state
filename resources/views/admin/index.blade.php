@extends('layouts.master')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome to your admin panel')

@section('content')
    <!-- Page title -->
    <div class="mb-6">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Overview</h2>
        <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your platform today.</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">12,847</p>
                    <p class="text-green-500 text-sm mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        12.5% from last month
                    </p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-users text-blue-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">$48,926</p>
                    <p class="text-green-500 text-sm mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        8.3% from last month
                    </p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-dollar-sign text-green-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Card 3 -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Active Orders</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">1,258</p>
                    <p class="text-red-500 text-sm mt-2">
                        <i class="fas fa-arrow-down mr-1"></i>
                        3.2% from last month
                    </p>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-shopping-cart text-purple-500 text-2xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Card 4 -->
        <div class="card-hover bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Conversion Rate</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">4.7%</p>
                    <p class="text-green-500 text-sm mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        1.1% from last month
                    </p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-chart-line text-yellow-500 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Additional Stats Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Quick Stats -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Statistics</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-4 border border-gray-200 rounded-lg">
                    <div class="text-blue-500 text-2xl mb-2">
                        <i class="fas fa-eye"></i>
                    </div>
                    <p class="text-gray-500 text-sm">Page Views</p>
                    <p class="text-xl font-bold text-gray-800">24.5K</p>
                </div>
                <div class="text-center p-4 border border-gray-200 rounded-lg">
                    <div class="text-green-500 text-2xl mb-2">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <p class="text-gray-500 text-sm">New Orders</p>
                    <p class="text-xl font-bold text-gray-800">342</p>
                </div>
                <div class="text-center p-4 border border-gray-200 rounded-lg">
                    <div class="text-purple-500 text-2xl mb-2">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <p class="text-gray-500 text-sm">Comments</p>
                    <p class="text-xl font-bold text-gray-800">128</p>
                </div>
                <div class="text-center p-4 border border-gray-200 rounded-lg">
                    <div class="text-red-500 text-2xl mb-2">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <p class="text-gray-500 text-sm">Issues</p>
                    <p class="text-xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>
        
        <!-- System Status -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-6">System Status</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Server Load</span>
                        <span class="text-gray-700 font-medium">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Database</span>
                        <span class="text-gray-700 font-medium">42%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 42%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-700">Bandwidth</span>
                        <span class="text-gray-700 font-medium">78%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 78%"></div>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex items-center text-green-600">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>All systems operational</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Users Table -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Recent Users</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-blue-500 text-sm"></i>
                                </div>
                                <span class="font-medium">John Smith</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-gray-700">john@example.com</td>
                        <td class="px-4 py-4">
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>
                        </td>
                        <td class="px-4 py-4 text-gray-700">Administrator</td>
                        <td class="px-4 py-4 text-gray-700">2 days ago</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-purple-500 text-sm"></i>
                                </div>
                                <span class="font-medium">Sarah Johnson</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-gray-700">sarah@example.com</td>
                        <td class="px-4 py-4">
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>
                        </td>
                        <td class="px-4 py-4 text-gray-700">Editor</td>
                        <td class="px-4 py-4 text-gray-700">1 week ago</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-yellow-500 text-sm"></i>
                                </div>
                                <span class="font-medium">Michael Chen</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-gray-700">michael@example.com</td>
                        <td class="px-4 py-4">
                            <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                        </td>
                        <td class="px-4 py-4 text-gray-700">Subscriber</td>
                        <td class="px-4 py-4 text-gray-700">3 days ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection