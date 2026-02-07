<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove old unused hero button fields
        DB::table('site_settings')->whereIn('key', [
            'hero_button_text',
            'hero_button_link',
        ])->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add old fields if needed (for rollback)
        $settings = [
            ['key' => 'hero_button_text', 'value' => 'Get Started', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_button_link', 'value' => '/contact', 'type' => 'text', 'group' => 'homepage_hero'],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
};
