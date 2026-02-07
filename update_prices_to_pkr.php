<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// Update prices to PKR (multiply by 280 for USD to PKR conversion)
// Basic: $700 -> PKR 196,000
// Gold: $1,200 -> PKR 336,000
// Platinum: $2,000 -> PKR 560,000

DB::table('packages')->where('name', 'Basic Package')->update(['price' => 196000]);
DB::table('packages')->where('name', 'Gold Package')->update(['price' => 336000]);
DB::table('packages')->where('name', 'Platinum Package')->update(['price' => 560000]);

echo "✅ Prices successfully updated to PKR!\n";
echo "Basic Package: PKR 196,000\n";
echo "Gold Package: PKR 336,000\n";
echo "Platinum Package: PKR 560,000\n";
