<?php

namespace Database\Seeders;

use App\Models\Axolotl;
use Illuminate\Database\Seeder;

class AxolotlSeeder extends Seeder
{
    public function run(): void
    {
        Axolotl::factory()->count(10)->create();
    }
}
