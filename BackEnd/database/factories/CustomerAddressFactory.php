<?php

namespace Database\Factories;

use App\Models\Customers;
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
            'customer_id' => fake()->randomElement(Customers::pluck('id')->toArray()),

        ];
    }
}
