<?php

namespace Database\Factories;

use App\Models\Billing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            "collection_amount" => fake()->randomElement([250, 350, 450, 650]),
            "collection_type" => fake()->randomElement(['cash', 'cheque', 'bkash', 'nagad']),
            "user_id" => fake()->numberBetween(1, 20),
            "billing_id" => fake()->randomElement(Billing::pluck('id')->toArray()),
        ];
    }
}
