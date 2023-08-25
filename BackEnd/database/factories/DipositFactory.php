<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DipositFactory extends Factory
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
            'customer_id' =>  fake()->randomElement(Customers::pluck('id')->toArray()),
            'user_id' => fake()->randomElement(User::pluck('id')->toArray())
        ];
    }
}
