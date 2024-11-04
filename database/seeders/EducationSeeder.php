<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            [
                'degree' => 'Bachelor of Science in Computer Science',
                'institution' => 'University of Dhaka',
                'start_date' => '2018-01-01',
                'end_date' => '2022-12-31',
                'description' => 'Completed a four-year degree focusing on software engineering and development.',
            ],
            [
                'degree' => 'Master of Science in Software Engineering',
                'institution' => 'Bangladesh University of Engineering and Technology',
                'start_date' => '2023-01-01',
                'end_date' => '2025-12-31',
                'description' => 'Pursuing a master’s degree with a focus on advanced software development practices.',
            ],
            [
                'degree' => 'Diploma in Web Development',
                'institution' => 'ABC Institute of Technology',
                'start_date' => '2017-06-01',
                'end_date' => '2018-05-31',
                'description' => 'Completed a diploma program focused on front-end and back-end web development.',
            ],
        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
