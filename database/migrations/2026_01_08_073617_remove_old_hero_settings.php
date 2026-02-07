<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove all old video and slider related settings
        DB::table('site_settings')->whereIn('key', [
            'video',
            'video_enabled',
            'enable_video',
            'slider_image_1',
            'slider_image_2',
            'slider_image_3',
            'slider_image_4',
            'slider_image_5',
            'slider_enabled',
            'enable_slider',
            'hero_image', // Old single image field
        ])->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to restore old settings
    }
};
