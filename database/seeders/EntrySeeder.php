<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Entry;
use App\Models\Metric;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get three users
        $users = User::take(3)->get();

        foreach ($users as $user) {
            // Get metrics for the current user
            $metrics = Metric::where('created_by', $user->id)->get();

            foreach ($metrics as $metric) {
                // Create entries with unique metric IDs for each user
                if ($metric->input_type == 'text')
                {
                    Entry::create([
                        'user_id' => $user->id,
                        'metric_id' => $metric->id,
                        'value' => '5 hours',
                        'created_at' => '2024-01-28 12:00:00',
                        'updated_at' => '2024-01-28 12:00:00'
                    ]);
                }
                else if ($metric->input_type == 'dropdown')
                {
                    Entry::create([
                        'user_id' => $user->id,
                        'metric_id' => $metric->id,
                        'value' => '+2',
                        'created_at' => '2024-01-28 12:00:00',
                        'updated_at' => '2024-01-28 12:00:00'
                    ]);
                }
                else
                {
                    Entry::create([
                        'user_id' => $user->id,
                        'metric_id' => $metric->id,
                        'value' => 'Today was a very good day',
                        'created_at' => '2024-01-28 12:00:00',
                        'updated_at' => '2024-01-28 12:00:00'
                    ]);
                }

                // Add more entry creation logic or customize as needed...
            }
        }

    }
}
