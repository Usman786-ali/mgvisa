<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

$media = DB::table('site_settings')->where('key', 'hero_media')->first();
$type = DB::table('site_settings')->where('key', 'hero_media_type')->first();

echo "Hero Media Type: " . ($type->value ?? 'Not Set') . "\n";
echo "Hero Media Value: " . ($media->value ?? 'Not Set') . "\n";

if ($media && $type && $type->value == 'slideshow') {
    $images = json_decode($media->value, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        echo "Decoded Images:\n";
        print_r($images);
    } else {
        echo "JSON Decode Error: " . json_last_error_msg() . "\n";
    }
}
