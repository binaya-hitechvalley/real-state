<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
foreach(\App\Models\Property::with('images')->take(2)->orderByDesc('created_at')->get() as $p) {
    echo 'Property: '.$p->id.' / Image Path: '.$p->images->first()->image_path . PHP_EOL;
}
