<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task_assignment>
 */
class Task_assignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $assignedAt = $this->faker->dateTimeBetween('-30 days', 'now');
        $completedAt = null;
        
        // 60% chance that the task has been completed
        if ($this->faker->boolean(60)) {
            $completedAt = $this->faker->dateTimeBetween($assignedAt, 'now');
        }

        return [
            'user_id' => User::factory(),
            'task_id' => Task::factory(),
            'assigned_at' => $assignedAt,
            'completed_at' => $completedAt,
        ];
    }
}
