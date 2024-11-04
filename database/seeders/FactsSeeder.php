<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fact; // Make sure to import the Fact model

class FactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for facts
        $facts = [
            [
                'top_description' => 'Our Achievements',
                'clients' => 100,
                'projects' => 200,
                'hours_of_support' => 5000,
                'awards' => 10,
            ],
        ];

        // Insert data into the facts table
        foreach ($facts as $fact) {
            Fact::create($fact);
        }
    }
}
