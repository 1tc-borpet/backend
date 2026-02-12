<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['pending', 'in_progress', 'completed', 'on_hold', 'cancelled'];
        
        // Create 10 tasks with different statuses (2 per status)
        foreach ($statuses as $status) {
            for ($i = 0; $i < 2; $i++) {
                Task::factory()->create([
                    'status' => $status,
                ]);
            }
        }
    }
}
