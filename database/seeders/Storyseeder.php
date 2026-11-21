<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Seeder;
php artisan tinker --execute='echo "Axolotls: ".\App\Models\Axolotl::count()." Stories: ".\App\Models\Story::count();'
class StorySeeder extends Seeder
{
    public function run(): void
    {
        Story::factory()->count(10)->create();
    }
}
