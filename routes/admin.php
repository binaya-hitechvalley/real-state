<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\BusinessTypeController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyFeatureController;

// Admin routes will be defined here
// Example:
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Sliders Management
    Route::resource('sliders', SliderController::class)->names('admin.sliders');
    Route::post('sliders/{id}/toggle-status', [SliderController::class, 'toggleStatus'])->name('admin.sliders.toggle-status');
    Route::post('sliders/update-order', [SliderController::class, 'updateOrder'])->name('admin.sliders.update-order');
    
    // Property Types Management
    Route::resource('property-types', PropertyTypeController::class)->names('admin.property-types');
    
    // Business Types Management
    Route::resource('business-types', BusinessTypeController::class)->names('admin.business-types');
    
    // Properties Management
    Route::resource('properties', PropertyController::class)->names('admin.properties');
    Route::post('properties/{id}/toggle-featured', [PropertyController::class, 'toggleFeatured'])->name('admin.properties.toggle-featured');
    Route::delete('properties/{id}/images/{imageId}', [PropertyController::class, 'deleteImage'])->name('admin.properties.delete-image');
    Route::post('properties/{id}/images/{imageId}/set-primary', [PropertyController::class, 'setPrimaryImage'])->name('admin.properties.set-primary-image');
    Route::get('properties/municipalities/{stateId}', [PropertyController::class, 'getMunicipalities'])->name('admin.properties.municipalities');
    
    // Property Features Management
    Route::resource('property-features', PropertyFeatureController::class)->names('admin.property-features');
});
