<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "bill_amount" => fake()->randomElement([250, 350, 450, 650]),
            "addtional_charge" => fake()->randomElement([0, 100, 250]),
            "discount" => fake()->randomElement([100, 250]),
            "vat" => fake()->randomElement([0, 5, 10]),
            "advance" => fake()->randomElement([250, 350]),
            "billing_month" => now(),
            "dues" => fake()->randomElement([250, 350]),
            "customer_id" => fake()->randomElement(Customers::pluck('id')->toArray()),

        ];
    }
}
