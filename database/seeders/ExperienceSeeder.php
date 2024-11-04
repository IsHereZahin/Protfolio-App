<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience; // Import the Experience model

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Realistic data for experiences with a logical career progression
        $experiences = [
            [
                'position' => 'Software Engineer',
                'company' => 'Innovates Solutions',
                'start_date' => '2023-04-01',
                'end_date' => null, // Current position
                'description' => 'Leading development of scalable web applications using Laravel and Vue.js, focusing on code optimization and user experience.',
            ],
            [
                'position' => 'Junior Developer',
                'company' => 'Pioneer Digital',
                'start_date' => '2021-08-01',
                'end_date' => '2023-03-31',
                'description' => 'Collaborated on client projects, assisted with frontend development and backend troubleshooting, and contributed to agile development practices.',
            ],
            [
                'position' => 'Software Development Intern',
                'company' => 'Bright Future Tech',
                'start_date' => '2020-06-01',
                'end_date' => '2021-07-31',
                'description' => 'Gained hands-on experience with modern web technologies, assisted in debugging and testing processes, and supported agile development teams.',
            ],
        ];

        // Insert data into the experiences table
        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
