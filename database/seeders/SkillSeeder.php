<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill; // Ensure to import the Skill model

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for skills
        $skills = [
            [
                'name' => 'PHP',
                'proficiency' => 85,
            ],
            [
                'name' => 'JavaScript',
                'proficiency' => 90,
            ],
            [
                'name' => 'Laravel',
                'proficiency' => 80,
            ],
            [
                'name' => 'Vue.js',
                'proficiency' => 75,
            ],
            [
                'name' => 'Selenium',
                'proficiency' => 70,
            ],
            [
                'name' => 'Figma',
                'proficiency' => 65,
            ],
        ];

        // Insert data into the skills table
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
