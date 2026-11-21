<?php

namespace Database\Factories;

use App\Models\Axolotl;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Axolotl>
 */
class AxolotlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'colour' => fake()->randomElement([
                'pink',
                'white',
                'brown',
                'golden'
            ]),
            'age' => fake()->numberBetween(1, 10),
        ];
    }
}

