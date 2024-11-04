<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience; // Ensure to import the Experience model

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for experiences
        $experiences = [
            [
                'position' => 'Software Engineer',
                'company' => 'Tech Solutions Ltd.',
                'start_date' => '2022-01-01',
                'end_date' => '2023-01-01',
                'description' => 'Developed web applications using Laravel and Vue.js.',
            ],
            [
                'position' => 'Junior Developer',
                'company' => 'Web Innovations Inc.',
                'start_date' => '2021-01-01',
                'end_date' => '2021-12-31',
                'description' => 'Assisted in developing client-side applications.',
            ],
            [
                'position' => 'Intern',
                'company' => 'Startup Hub',
                'start_date' => '2020-06-01',
                'end_date' => null, // Current position
                'description' => 'Worked on various projects and learned modern web technologies.',
            ],
        ];

        // Insert data into the experiences table
        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
