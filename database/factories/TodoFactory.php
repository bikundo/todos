<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    : array
    {
        return [
            'name'      => $this->faker->sentence(3),
            'completed' => $this->faker->boolean(),
        ];
    }
}
