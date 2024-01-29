<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Metric;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get three users
        $users = User::take(3)->get();

        foreach ($users as $user) {
            // Create metrics with default questions for each user
            Metric::create([
                'name' => 'How_many_hours_spent_doing_creative_work?',
                'input_type' => 'text',
                'created_by' => $user->id,
            ]);

            Metric::create([
                'name' => 'A_quality_score_for_the_day',
                'input_type' => 'dropdown',
                'created_by' => $user->id,
            ]);

            Metric::create([
                'name' => 'A_note_for_the_day',
                'input_type' => 'textarea',
                'created_by' => $user->id,
            ]);

        }
    }
}