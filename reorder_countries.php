<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Update country orders
$updates = [
    'Malaysia' => 1,
    'Australia' => 2,
    'Denmark' => 3,
    'Dubai (UAE)' => 4,
    'Spain' => 5,
    'South Africa' => 6,
];

foreach ($updates as $countryName => $order) {
    $country = App\Models\Country::where('name', 'LIKE', '%' . $countryName . '%')->first();
    if ($country) {
        $country->update(['order' => $order]);
        echo "✓ Updated: {$country->name} -> Order: {$order}\n";
    } else {
        echo "✗ Not found: {$countryName}\n";
    }
}

echo "\nCurrent Order:\n";
foreach (App\Models\Country::orderBy('order')->get() as $country) {
    echo "  {$country->order}. {$country->name}\n";
}
