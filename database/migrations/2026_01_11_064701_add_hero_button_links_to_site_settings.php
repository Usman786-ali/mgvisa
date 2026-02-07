<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert hero button link settings
        $settings = [
            ['key' => 'hero_button1_text', 'value' => 'Text Now', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_button1_link', 'value' => 'https://wa.me/923002194957', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_button2_text', 'value' => 'Our Services', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_button2_link', 'value' => '#services', 'type' => 'text', 'group' => 'homepage_hero'],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove hero button link settings
        DB::table('site_settings')->whereIn('key', [
            'hero_button1_text',
            'hero_button1_link',
            'hero_button2_text',
            'hero_button2_link',
        ])->delete();
    }
};
