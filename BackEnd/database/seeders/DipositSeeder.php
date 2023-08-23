<?php

namespace Database\Seeders;

use App\Models\Diposit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DipositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diposit::factory(20)->create();
    }
}
