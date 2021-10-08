<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Categorie::factory()
        ->has(Hotel::factory()->count(50))
        ->count(10)
        ->create();
    }
}
