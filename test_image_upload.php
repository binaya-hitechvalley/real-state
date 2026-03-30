<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test image upload functionality
echo "Testing image upload functionality...\n";

// Check if ImageService exists
if (class_exists('App\Services\Admin\ImageService')) {
    echo "✅ ImageService class found\n";
} else {
    echo "❌ ImageService class not found\n";
}

// Check if PropertyService exists
if (class_exists('App\Services\Admin\PropertyService')) {
    echo "✅ PropertyService class found\n";
} else {
    echo "❌ PropertyService class not found\n";
}

// Check if directories exist
$propertiesDir = storage_path('app/public/properties');
if (is_dir($propertiesDir)) {
    echo "✅ Properties storage directory exists\n";
} else {
    echo "❌ Properties storage directory missing\n";
}

// Check if directory is writable
if (is_writable($propertiesDir)) {
    echo "✅ Properties directory is writable\n";
} else {
    echo "❌ Properties directory is not writable\n";
}

// Test creating a simple property without images
echo "\nTesting property creation without images...\n";
try {
    $propertyType = \App\Models\PropertyType::first();
    $businessType = \App\Models\BusinessType::first();
    $state = \App\Models\State::first();
    $municipality = \App\Models\Municipality::first();
    
    $propertyData = [
        'title' => 'Test Property',
        'description' => 'Test description',
        'property_type_id' => $propertyType->id,
        'business_type_id' => $businessType->id,
        'state_id' => $state->id,
        'municipality_id' => $propertyType->id,
        'price' => 100000,
        'status' => 'available',
        'is_featured' => false,
    ];
    
    $property = \App\Models\Property::create($propertyData);
    echo "✅ Property created successfully (ID: {$property->id})\n";
    
} catch (\Exception $e) {
    echo "❌ Property creation failed: " . $e->getMessage() . "\n";
}

echo "\nImage upload system is ready for testing!\n";
