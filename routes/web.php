<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PropertyController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index']);

// Properties routes
Route::get('/properties', [PropertyController::class, 'index'])->name('frontend.properties.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('frontend.properties.show');
Route::post('/properties/{property:slug}/inquire', [PropertyController::class, 'inquire'])->name('frontend.properties.inquire');

// Location API routes for frontend
Route::get('/api/districts/{state}', [PropertyController::class, 'getDistricts'])->name('frontend.api.districts');
Route::get('/api/municipalities/{district}', [PropertyController::class, 'getMunicipalities'])->name('frontend.api.municipalities');

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('frontend.blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('frontend.blogs.show');

// About page
Route::get('/about', function () {
    $settings = \App\Models\SiteSetting::getGroup('about');
    return view('frontend.about', compact('settings'));
})->name('frontend.about');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('frontend.contact.store');

// Bookings routes
Route::get('/bookings/create', function () {
    return view('frontend.bookings.create');
});

Route::get('/bookings/success', function () {
    return view('frontend.bookings.success');
});

// Include admin routes
require __DIR__.'/admin.php';
