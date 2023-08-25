<?php

namespace Database\Seeders;

use App\Models\CustomerHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerHistory::factory(50)->create();
    }
}
