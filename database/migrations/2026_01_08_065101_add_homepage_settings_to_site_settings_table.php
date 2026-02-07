<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert homepage settings
        $settings = [
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Your Gateway to Global Opportunities', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_subtitle', 'value' => 'Expert Visa & Immigration Consultancy Services', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_description', 'value' => 'We simplify your immigration journey with professional visa consultancy services for study, work, tourism, and permanent residency across 50+ countries.', 'type' => 'textarea', 'group' => 'homepage_hero'],
            ['key' => 'hero_image', 'value' => '/images/hero-bg.jpg', 'type' => 'image', 'group' => 'homepage_hero'],
            ['key' => 'hero_button_text', 'value' => 'Get Started', 'type' => 'text', 'group' => 'homepage_hero'],
            ['key' => 'hero_button_link', 'value' => '/contact', 'type' => 'text', 'group' => 'homepage_hero'],

            // About Section  
            ['key' => 'about_title', 'value' => 'About MG Visa Consultant', 'type' => 'text', 'group' => 'homepage_about'],
            ['key' => 'about_description', 'value' => 'With years of experience in visa consultancy, we help individuals and families achieve their dreams of studying, working, or settling abroad.', 'type' => 'textarea', 'group' => 'homepage_about'],
            ['key' => 'about_image', 'value' => '/images/about.jpg', 'type' => 'image', 'group' => 'homepage_about'],

            // Stats Section
            ['key' => 'stats_clients', 'value' => '5000', 'type' => 'number', 'group' => 'homepage_stats'],
            ['key' => 'stats_countries', 'value' => '50', 'type' => 'number', 'group' => 'homepage_stats'],
            ['key' => 'stats_success_rate', 'value' => '95', 'type' => 'number', 'group' => 'homepage_stats'],
            ['key' => 'stats_experience', 'value' => '10', 'type' => 'number', 'group' => 'homepage_stats'],

            // Services Section
            ['key' => 'services_title', 'value' => 'Our Services', 'type' => 'text', 'group' => 'homepage_services'],
            ['key' => 'services_description', 'value' => 'Comprehensive visa and immigration solutions tailored to your needs', 'type' => 'textarea', 'group' => 'homepage_services'],

            // Why Choose Us Section
            ['key' => 'why_choose_title', 'value' => 'Why Choose Us', 'type' => 'text', 'group' => 'homepage_why'],
            ['key' => 'why_choose_subtitle', 'value' => 'Your Trusted Visa Partner', 'type' => 'text', 'group' => 'homepage_why'],
            ['key' => 'why_choose_description', 'value' => 'In partnership with Wisdom Global Studies, we specialize in study visa processing, making your educational dreams a reality with our combined expertise and proven track record.', 'type' => 'textarea', 'group' => 'homepage_why'],

            // Packages Section
            ['key' => 'packages_title', 'value' => 'Hajj & Umrah Packages', 'type' => 'text', 'group' => 'homepage_packages'],
            ['key' => 'packages_description', 'value' => 'Choose the best package that suits your spiritual journey with complete peace of mind.', 'type' => 'textarea', 'group' => 'homepage_packages'],

            // Process Section
            ['key' => 'process_title', 'value' => 'Simple Process', 'type' => 'text', 'group' => 'homepage_process'],
            ['key' => 'process_description', 'value' => 'Get your visa in just 4 easy steps', 'type' => 'textarea', 'group' => 'homepage_process'],

            // Contact Section
            ['key' => 'contact_title', 'value' => 'Ready to Start Your Journey?', 'type' => 'text', 'group' => 'homepage_contact'],
            ['key' => 'contact_description', 'value' => 'Contact us today for a free consultation and let us help you achieve your travel dreams.', 'type' => 'textarea', 'group' => 'homepage_contact'],
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
        // Remove homepage settings
        DB::table('site_settings')->whereIn('group', [
            'homepage_hero',
            'homepage_about',
            'homepage_stats',
            'homepage_services',
            'homepage_why',
            'homepage_packages',
            'homepage_process',
            'homepage_contact',
        ])->delete();
    }
};
