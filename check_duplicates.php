<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Municipality;

// Find duplicate municipality names
$duplicates = Municipality::selectRaw('name, COUNT(*) as count')
    ->groupBy('name')
    ->havingRaw('count > 1')
    ->get();

echo "Duplicate Municipalities:\n";
foreach ($duplicates as $duplicate) {
    echo "- {$duplicate->name}: {$duplicate->count} times\n";
}

// Get total count
$total = Municipality::count();
echo "\nTotal Municipalities: {$total}\n";
