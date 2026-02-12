<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Task_assignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing users and tasks
        $users = User::all();
        $tasks = Task::all();

        // Ensure we have data to work with
        if ($users->isEmpty() || $tasks->isEmpty()) {
            return;
        }

        // Assign each task to random users (1-3 assignments per task)
        $tasks->each(function (Task $task) use ($users) {
            $assignmentCount = random_int(1, 3);
            $selectedUsers = $users->random(min($assignmentCount, $users->count()));

            foreach ($selectedUsers as $user) {
                Task_assignment::factory()->create([
                    'user_id' => $user->id,
                    'task_id' => $task->id,
                ]);
            }
        });
    }
}
