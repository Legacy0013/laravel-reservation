<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Categorie;
use App\Models\Etiquette;
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
        // ->has(Hotel::factory()->count(50))
        ->count(10)
        ->create();

        Etiquette::factory()
        ->count(10)
        ->create();

        $idEtiquettes = range(1, 10);
        Hotel::factory()
            ->count(100)
            ->create()
            ->each(function ($hotel) use ($idEtiquettes) {
                shuffle($idEtiquettes);
                $hotel->etiquettes()
                    ->attach(array_slice($idEtiquettes, 0, rand(0,4)));
        });
    }
}
