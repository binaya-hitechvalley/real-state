<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$districts = App\Models\District::withCount('municipalities')->orderBy('name')->get();

echo "=== Municipality Coverage by District ===\n\n";
$totalDistricts = 0;
$totalMunicipalities = 0;
$districtsWithFewMunicipalities = [];

foreach ($districts as $district) {
    $totalDistricts++;
    $totalMunicipalities += $district->municipalities_count;
    
    echo sprintf("%-25s: %d municipalities\n", $district->name, $district->municipalities_count);
    
    if ($district->municipalities_count <= 3) {
        $districtsWithFewMunicipalities[] = $district->name;
    }
}

echo "\n=== Summary ===\n";
echo "Total Districts: $totalDistricts\n";
echo "Total Municipalities: $totalMunicipalities\n";
echo "Average Municipalities per District: " . round($totalMunicipalities / $totalDistricts, 2) . "\n\n";

echo "=== Districts with 3 or fewer municipalities (may need more): ===\n";
foreach ($districtsWithFewMunicipalities as $districtName) {
    echo "- $districtName\n";
}

echo "\n=== Checking specific districts mentioned ===\n";
$specificDistricts = ['Mahottari', 'Dhanusha', 'Sarlahi', 'Siraha', 'Parsa', 'Rautahat'];
foreach ($specificDistricts as $districtName) {
    $district = App\Models\District::where('name', $districtName)->first();
    if ($district) {
        $municipalities = $district->municipalities()->pluck('name')->toArray();
        echo "\n$districtName ({$district->municipalities_count}):\n";
        foreach ($municipalities as $municipality) {
            echo "  - $municipality\n";
        }
    } else {
        echo "\n$districtName: Not found\n";
    }
}
