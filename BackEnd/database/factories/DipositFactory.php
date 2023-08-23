<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class diposiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'add_deposit' => fake()->randomElement([500, 1000, 2000]),
            'return_deposit' => fake()->randomElement([500, 1000, 2000]),

        ];
    }
}
