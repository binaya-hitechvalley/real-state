<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PropertyController;

Route::get('/', [HomeController::class, 'index']);

// Properties routes
Route::get('/properties', [PropertyController::class, 'index'])->name('frontend.properties.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('frontend.properties.show');

// Routes based on Flowchart
Route::get('/properties/demo', function () {
    return view('frontend.properties.show');
});

Route::get('/bookings/create', function () {
    return view('frontend.bookings.create');
});

Route::get('/bookings/success', function () {
    return view('frontend.bookings.success');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

// Include admin routes
require __DIR__.'/admin.php';
