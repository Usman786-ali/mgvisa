<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Countries to add
$newCountries = [
    [
        'name' => 'Malaysia',
        'slug' => 'malaysia',
        'short_description' => 'Gateway to Southeast Asia',
        'description' => 'Malaysia offers various visa options for tourists, students, and workers.',
        'requirements' => 'Valid passport, visa application form, passport photos',
        'processing_time' => '3-5 working days',
        'fees' => 100.00,
        'order' => 1,
        'is_popular' => true,
        'is_active' => true,
    ],
    [
        'name' => 'Denmark',
        'slug' => 'denmark',
        'short_description' => 'Scandinavian excellence',
        'description' => 'Denmark provides excellent visa programs for various purposes.',
        'requirements' => 'Valid passport, visa application, travel insurance',
        'processing_time' => '15-30 days',
        'fees' => 80.00,
        'order' => 3,
        'is_popular' => false,
        'is_active' => true,
    ],
    [
        'name' => 'Spain',
        'slug' => 'spain',
        'short_description' => 'European charm and culture',
        'description' => 'Spain offers various visa categories for tourism, work, and study.',
        'requirements' => 'Valid passport, visa application, proof of funds',
        'processing_time' => '15-30 days',
        'fees' => 80.00,
        'order' => 5,
        'is_popular' => false,
        'is_active' => true,
    ],
    [
        'name' => 'South Africa',
        'slug' => 'south-africa',
        'short_description' => 'African adventure awaits',
        'description' => 'South Africa welcomes visitors with various visa options.',
        'requirements' => 'Valid passport, visa application form, yellow fever certificate',
        'processing_time' => '10-20 days',
        'fees' => 70.00,
        'order' => 6,
        'is_popular' => false,
        'is_active' => true,
    ],
];

foreach ($newCountries as $countryData) {
    $existing = App\Models\Country::where('name', $countryData['name'])->first();
    if (!$existing) {
        App\Models\Country::create($countryData);
        echo "✓ Added: {$countryData['name']}\n";
    } else {
        echo "Already exists: {$countryData['name']}\n";
    }
}

// Now reorder ALL countries
$order = [
    'Malaysia' => 1,
    'Australia' => 2,
    'Denmark' => 3,
    'Dubai (UAE)' => 4,
    'Spain' => 5,
    'South Africa' => 6,
    'United States' => 7,
    'Canada' => 8,
    'United Kingdom' => 9,
    'Schengen Countries' => 10,
    'Pakistan' => 11,
];

echo "\nReordering countries...\n";
foreach ($order as $name => $orderNum) {
    $country = App\Models\Country::where('name', 'LIKE', '%' . $name . '%')->first();
    if ($country) {
        $country->update(['order' => $orderNum]);
        echo "✓ {$orderNum}. {$country->name}\n";
    }
}

echo "\n✅ Done! Countries reordered.\n";
