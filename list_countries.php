<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Country;

$countries = Country::all();
echo "--- All Countries ---\n";
foreach ($countries as $country) {
    echo $country->id . ": " . $country->name . "\n";
}
