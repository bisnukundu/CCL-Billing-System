<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $customer_type = ['analog', 'digital'];
//        $random_index = array_rand($customer_type);
//        $random_customer_type = $customer_type[$random_index];

        return [
            'name' => fake()->name(),
            'mobile' => fake()->phoneNumber(),
            'customer_type' => fake()->randomElement(['analog', 'digital']),
            'monthly_bill' => fake()->randomElement([350, 450, 650]),
            'additional_charge' => fake()->randomElement([400, 522, 630, 250]),
            'discount' => fake()->randomElement([50, 366, 22, 66]),
            'active' => fake()->randomElement([true, false]),
            'connection_date' => fake()->date,
            'bill_genarate_status' => fake()->randomElement(['Y', null]),
            'note' => fake()->text(),
            'bill_collector' => fake()->name(),
            'number_of_connection' => fake()->numberBetween(1, 5)
        ];
    }
}
