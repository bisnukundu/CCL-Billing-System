<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transection_type' => fake()->randomElement(['cheque', 'cash']),
            'description' => fake()->text(),
            'customer_id' => fake()->randomElement(Customers::pluck('id')->toArray()),
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
