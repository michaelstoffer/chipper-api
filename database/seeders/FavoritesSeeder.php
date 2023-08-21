<?php

namespace Database\Seeders;

use App\Models\Favorites;
use Illuminate\Database\Seeder;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Favorites::factory()
            ->count(5)
            ->create();
    }
}
