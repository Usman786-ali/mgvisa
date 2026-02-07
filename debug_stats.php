<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

$stats = DB::table('site_settings')->where('group', 'homepage_stats')->get();
echo "--- Homepage Stats Dump ---\n";
foreach ($stats as $stat) {
    echo "Key: " . $stat->key . " | Value: " . $stat->value . "\n";
}
