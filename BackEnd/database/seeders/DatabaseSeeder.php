<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Billing;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();


        $this->call(
            [
                CustomersSeeder::class,
                CustomerAddressSeeder::class,
                CustomerHistorySeeder::class,
                DipositSeeder::class,
                BillingSeeder::class,
                PaymentSeeder::class,
                HardwareSeeder::class,
            ]
        );
    }
}
