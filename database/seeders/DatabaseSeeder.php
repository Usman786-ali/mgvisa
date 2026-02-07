<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mgvisa.com',
            'password' => bcrypt('password'),
        ]);

        // Seed Services
        $services = [
            [
                'title' => 'Tourist Visa Assistance',
                'slug' => 'tourist-visa-assistance',
                'short_description' => 'Complete assistance for tourist visa applications worldwide',
                'description' => 'Our expert team provides comprehensive support for tourist visa applications to popular destinations worldwide. We handle all documentation, application processing, and follow-ups to ensure a smooth visa approval process.',
                'icon' => 'fa-plane',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Student Visa Services',
                'slug' => 'student-visa-services',
                'short_description' => 'Expert guidance for student visa applications',
                'description' => 'We specialize in student visa applications for universities across the globe. Our services include university selection, application assistance, documentation support, and visa interview preparation.',
                'icon' => 'fa-graduation-cap',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Work Permit & Business Visa',
                'slug' => 'work-permit-business-visa',
                'short_description' => 'Professional services for work permits and business visas',
                'description' => 'Navigate the complex process of obtaining work permits and business visas with our expert assistance. We ensure all requirements are met and provide ongoing support throughout the application process.',
                'icon' => 'fa-briefcase',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Family & Spouse Visa',
                'slug' => 'family-spouse-visa',
                'short_description' => 'Reunite with your loved ones',
                'description' => 'We help families reunite by providing expert assistance with family reunification and spouse visa applications. Our compassionate team ensures all documentation is prepared correctly.',
                'icon' => 'fa-heart',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Document Translation & Attestation',
                'slug' => 'document-translation-attestation',
                'short_description' => 'Professional document services',
                'description' => 'Get your documents professionally translated and attested for visa applications. We provide certified translations and handle all attestation requirements.',
                'icon' => 'fa-file-alt',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Visa Interview Preparation',
                'slug' => 'visa-interview-preparation',
                'short_description' => 'Be confident in your visa interview',
                'description' => 'Prepare for your visa interview with our expert coaching. We provide mock interviews, tips, and guidance to help you succeed in your visa interview.',
                'icon' => 'fa-comments',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }

        // Seed Countries
        $countries = [
            [
                'name' => 'United States',
                'slug' => 'united-states',
                'short_description' => 'Land of opportunities and dreams',
                'description' => 'The United States offers diverse visa options for tourists, students, and workers.',
                'requirements' => 'Valid passport, DS-160 form, visa fee payment, interview appointment',
                'processing_time' => '2-4 weeks',
                'fees' => 160.00,
                'order' => 1,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Canada',
                'slug' => 'canada',
                'short_description' => 'Beautiful country with excellent opportunities',
                'description' => 'Canada welcomes immigrants and visitors with various visa programs.',
                'requirements' => 'Valid passport, online application, biometrics, proof of funds',
                'processing_time' => '3-6 weeks',
                'fees' => 100.00,
                'order' => 2,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name' => 'United Kingdom',
                'slug' => 'united-kingdom',
                'short_description' => 'Rich history and world-class education',
                'description' => 'The UK offers various visa categories for different purposes.',
                'requirements' => 'Valid passport, visa application form, supporting documents, biometrics',
                'processing_time' => '3-4 weeks',
                'fees' => 115.00,
                'order' => 3,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Australia',
                'slug' => 'australia',
                'short_description' => 'Amazing lifestyle and opportunities',
                'description' => 'Australia provides excellent visa options for skilled workers and students.',
                'requirements' => 'Valid passport, ImmiAccount registration, health examination, police clearance',
                'processing_time' => '4-8 weeks',
                'fees' => 145.00,
                'order' => 4,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Schengen Countries',
                'slug' => 'schengen-countries',
                'short_description' => 'Visit 27 European countries with one visa',
                'description' => 'The Schengen visa allows you to travel across 27 European countries.',
                'requirements' => 'Valid passport, travel insurance, flight reservations, hotel bookings',
                'processing_time' => '15-30 days',
                'fees' => 80.00,
                'order' => 5,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Dubai (UAE)',
                'slug' => 'dubai-uae',
                'short_description' => 'Modern city with endless possibilities',
                'description' => 'Dubai offers various visa types for tourism, business, and employment.',
                'requirements' => 'Valid passport, passport photos, visa application form, sponsor details',
                'processing_time' => '3-5 working days',
                'fees' => 50.00,
                'order' => 6,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
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
            ],
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }

        // Seed Visa Types
        $visaTypes = [
            ['name' => 'Tourist Visa', 'slug' => 'tourist-visa', 'description' => 'For leisure and tourism purposes', 'icon' => 'fa-camera', 'order' => 1],
            ['name' => 'Student Visa', 'slug' => 'student-visa', 'description' => 'For educational purposes', 'icon' => 'fa-book', 'order' => 2],
            ['name' => 'Work Visa', 'slug' => 'work-visa', 'description' => 'For employment purposes', 'icon' => 'fa-briefcase', 'order' => 3],
            ['name' => 'Business Visa', 'slug' => 'business-visa', 'description' => 'For business meetings and conferences', 'icon' => 'fa-handshake', 'order' => 4],
            ['name' => 'Family Visa', 'slug' => 'family-visa', 'description' => 'For family reunification', 'icon' => 'fa-users', 'order' => 5],
            ['name' => 'Transit Visa', 'slug' => 'transit-visa', 'description' => 'For passing through a country', 'icon' => 'fa-exchange-alt', 'order' => 6],
        ];

        foreach ($visaTypes as $visaType) {
            \App\Models\VisaType::create($visaType);
        }

        // Seed Testimonials
        $testimonials = [
            [
                'client_name' => 'Sarah Johnson',
                'position' => 'Software Engineer',
                'company' => 'Tech Corp',
                'country' => 'United States',
                'rating' => 5,
                'message' => 'MG Visa made my US work visa process incredibly smooth. Their team was professional, knowledgeable, and responsive throughout. Highly recommended!',
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'client_name' => 'Ahmed Al-Rashid',
                'position' => 'Business Owner',
                'company' => null,
                'country' => 'Canada',
                'rating' => 5,
                'message' => 'Excellent service! They helped me get my Canadian business visa without any hassle. The team guided me through every step of the process.',
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'client_name' => 'Maria Garcia',
                'position' => 'Student',
                'company' => 'University of London',
                'country' => 'United Kingdom',
                'rating' => 5,
                'message' => 'I was stressed about my UK student visa, but MG Visa handled everything perfectly. I got my visa approved on the first attempt. Thank you!',
                'order' => 3,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'client_name' => 'John Smith',
                'position' => 'Marketing Manager',
                'company' => 'Global Inc',
                'country' => 'Australia',
                'rating' => 5,
                'message' => 'Professional and efficient service. They made my Australian visa application process straightforward and stress-free. Highly satisfied with their work.',
                'order' => 4,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }

        // Seed Site Settings
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'MG Visa Consultant', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Your Gateway to the World', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Professional visa consultation services for all your travel needs', 'type' => 'textarea', 'group' => 'general'],

            // Contact Settings
            ['key' => 'contact_email', 'value' => 'info@mgvisa.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '123 Main Street, City, Country', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'contact_whatsapp', 'value' => '+1234567890', 'type' => 'text', 'group' => 'contact'],

            // Social Media
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/mgvisa', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/mgvisa', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/mgvisa', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/mgvisa', 'type' => 'text', 'group' => 'social'],

            // SEO Settings
            ['key' => 'meta_keywords', 'value' => 'visa consultant, visa services, immigration, travel visa', 'type' => 'textarea', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => '', 'type' => 'textarea', 'group' => 'seo'],
        ];

        foreach ($settings as $setting) {
            \App\Models\SiteSetting::create($setting);
        }
        // Seed Team Members
        $team = [
            [
                'name' => 'Haji Nisar Shah',
                'position' => 'CEO & Founder',
                'image' => 'images/team/haji-nisar-shah.jpg',
                'bio' => 'Visionary leader with 15+ years of experience in immigration law.',
                'facebook' => '#',
                'linkedin' => '#',
                'twitter' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Waqar Ahmed',
                'position' => 'Director',
                'image' => 'images/team/waqar-ahmed.jpg',
                'bio' => 'Expert in business strategy and global visa policies.',
                'facebook' => '#',
                'linkedin' => '#',
                'twitter' => '#',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Ubaid Khanzada',
                'position' => 'Manager',
                'image' => 'images/team/ubaid-khanzada.jpg',
                'bio' => 'Dedicated to ensuring smooth operations and client satisfaction.',
                'facebook' => '#',
                'linkedin' => '#',
                'twitter' => '#',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($team as $member) {
            \App\Models\TeamMember::create($member);
        }
    }

}
