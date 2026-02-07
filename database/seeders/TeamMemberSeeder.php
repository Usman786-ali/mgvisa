<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TeamMember::truncate();

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
