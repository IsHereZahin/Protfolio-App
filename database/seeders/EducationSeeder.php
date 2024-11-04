<?php

namespace Database\Seeders;

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
                'degree' => 'Diploma in Web Development',
                'institution' => 'ABC Institute of Technology',
                'start_date' => '2016-06-01',
                'end_date' => '2017-05-31',
                'description' => 'Completed a diploma program focused on front-end and back-end web development, including courses on HTML, CSS, JavaScript, and PHP.',
            ],
            [
                'degree' => 'Bachelor of Science in Computer Science',
                'institution' => 'University of Dhaka',
                'start_date' => '2018-01-01',
                'end_date' => '2021-12-31',
                'description' => 'Completed a four-year program focused on software engineering, algorithms, and data structures, with practical experience in various programming languages.',
            ],
            [
                'degree' => 'Master of Science in Software Engineering',
                'institution' => 'Bangladesh University of Engineering and Technology',
                'start_date' => '2023-01-01',
                'end_date' => null, // Currently enrolled
                'description' => 'Pursuing a master’s degree focusing on advanced software development practices, project management, and research in cutting-edge technologies.',
            ],
        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
