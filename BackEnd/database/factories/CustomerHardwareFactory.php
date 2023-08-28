<?php

namespace Database\Factories;

use App\Models\Customers;
use App\Models\Hardware;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerHardware>
 */
class CustomerHardwareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stb_type' => fake()->randomElement(['P', 'C1', 'C2']),
            'customer_id' => fake()->randomElement(Customers::pluck('id')->toArray()),
            'hardware_id' => fake()->randomElement(Hardware::pluck('id')->toArray())
        ];
    }
}
