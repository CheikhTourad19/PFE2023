<?php

namespace Database\Factories;
use App\Models\Annonce;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    protected $model = Annonce::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'idUser' => $this->faker->numberBetween(1, 1),
            'titre' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'categorie' => $this->faker->word,

        ];
    }
    public function run()
    {
        \App\Models\Annonce::factory(10)->create();
    }
}
