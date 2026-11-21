<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\Axolotl;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Story>
 */
class StoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'axolotl_id' => Axolotl::factory(),
        ];
    }
}
