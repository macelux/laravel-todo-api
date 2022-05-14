<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['title' => "string", 'completed' => "bool"])] public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'completed' => $this->faker->boolean,
        ];
    }
}
