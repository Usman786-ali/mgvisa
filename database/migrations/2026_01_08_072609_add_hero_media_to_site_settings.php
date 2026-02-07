<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add hero media settings (replaces hero_image with flexible media field)
        $settings = [
            ['key' => 'hero_media_type', 'value' => 'image', 'type' => 'select', 'group' => 'homepage_hero'],  // image, video, slideshow
            ['key' => 'hero_media', 'value' => '', 'type' => 'file', 'group' => 'homepage_hero'],  // Can be video or images
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting + ['created_at' => now(), 'updated_at' => now()]
            );
        }

        // Remove old hero_image if exists
        DB::table('site_settings')->where('key', 'hero_image')->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('site_settings')->whereIn('key', ['hero_media_type', 'hero_media'])->delete();

        // Restore hero_image
        DB::table('site_settings')->insert([
            'key' => 'hero_image',
            'value' => '/images/hero-bg.jpg',
            'type' => 'image',
            'group' => 'homepage_hero',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
};
