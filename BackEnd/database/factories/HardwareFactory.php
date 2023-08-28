<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hardware>
 */
class HardwareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stb_id' => fake()->numberBetween(1000000000, 900000000),
            'status' => fake()->randomElement(['Good', 'Problem', 'On Repari']),
            'remarks' => fake()->randomElement(['Uploaded', 'Old']),
        ];
    }
}
