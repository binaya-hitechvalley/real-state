<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

// Include admin routes
require __DIR__.'/admin.php';
