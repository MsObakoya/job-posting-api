<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,  //\App\Models\User::factory(),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'salary' => $this->faker->numberBetween(20000, 100000),
            'location' => $this->faker->city,
            'category' => $this->faker->randomElement(['IT', 'Marketing', 'Finance', 'HR']),
            'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Freelance']),
        ];
    }
}
