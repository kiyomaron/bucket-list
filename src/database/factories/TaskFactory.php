<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(15,40)),
            'is_achieved' => $this->faker->boolean(10),
            'created_at' => now(),
            'updated_at' => now(),
            'ideal_goal_on' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+30 years'),
            'user_id' => $this->faker->numberBetween(1,3)
        ];
    }
}
