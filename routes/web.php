<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

// Routes based on Flowchart
Route::get('/properties', function () {
    return view('frontend.properties.index');
});

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
