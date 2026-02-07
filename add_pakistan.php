<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Check if Pakistan exists
$pakistan = App\Models\Country::where('name', 'Pakistan')->first();

if (!$pakistan) {
    App\Models\Country::create([
        'name' => 'Pakistan',
        'slug' => 'pakistan',
        'short_description' => 'Home country with diverse opportunities',
        'description' => 'Pakistan offers various visa types for international visitors and business purposes.',
        'requirements' => 'Valid passport, visa application form, passport photos, supporting documents',
        'processing_time' => '1-2 weeks',
        'fees' => 60.00,
        'order' => 7,
        'is_popular' => false,
        'is_active' => true,
    ]);
    echo "✓ Pakistan added successfully!\n";
} else {
    echo "✓ Pakistan already exists!\n";
}

// List all countries
echo "\nAll Countries:\n";
foreach (App\Models\Country::orderBy('order')->get() as $country) {
    echo "  - " . $country->name . "\n";
}
