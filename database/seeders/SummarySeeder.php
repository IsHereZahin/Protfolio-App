<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Summary; // Make sure to include the Summary model

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample summary record
        Summary::create([
            'title' => 'Sample Summary Title',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                <ul>
                                    <li>Some description here.</li>
                                    <li>Another description here.</li>
                                    <li>More details here.</li>
                                </ul>
                            </p>',
        ]);
    }
}
