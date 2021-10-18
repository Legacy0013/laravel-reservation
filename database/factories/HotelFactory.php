<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'lieu' => $this->faker->city(),
            'categorie_id' => rand(1, 10),
            'quand'=> $this->faker->dateTimeInInterval('-20 days','+365 days', 'Europe/Paris'),
            'description' => $this->faker->paragraph(),
        ];
    }
}
