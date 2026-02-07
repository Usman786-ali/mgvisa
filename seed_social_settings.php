<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\SiteSetting;

$settings = [
    [
        'key' => 'social_facebook',
        'value' => 'https://facebook.com',
        'group' => 'social',
        'type' => 'text'
    ],
    [
        'key' => 'social_instagram',
        'value' => 'https://instagram.com',
        'group' => 'social',
        'type' => 'text'
    ],
    [
        'key' => 'social_youtube',
        'value' => 'https://youtube.com',
        'group' => 'social',
        'type' => 'text'
    ],
    [
        'key' => 'social_tiktok',
        'value' => 'https://tiktok.com',
        'group' => 'social',
        'type' => 'text'
    ]
];

foreach ($settings as $data) {
    SiteSetting::updateOrCreate(
        ['key' => $data['key']],
        $data
    );
    echo "Updated/Created: {$data['key']}\n";
}

// Optionally remove old ones if you want, or keep them.
// SiteSetting::whereIn('key', ['social_twitter', 'social_linkedin'])->delete();
// echo "Removed Twitter and LinkedIn settings\n";

echo "Done.\n";
