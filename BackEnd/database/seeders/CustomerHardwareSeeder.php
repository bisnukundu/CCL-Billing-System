<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerHardware;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerHardwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerHardware::factory(50)->create();
    }
}
