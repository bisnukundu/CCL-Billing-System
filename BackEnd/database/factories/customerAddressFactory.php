<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class customerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'house' => fake()->word(),
            'flat' => fake()->word(),
            'road' => fake()->address(),
            'building_name' => fake()->name(),
            'area' => ucfirst(fake()->word()),

      ];
    }
}
