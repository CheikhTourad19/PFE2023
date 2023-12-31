<?php

namespace Database\Factories;
use App\Models\Annonce;

use App\Models\Image;
use App\Models\User;
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
            'user_id' => User::all()->random()->id,
            'titre' => fake()->realText,
            'description' => fake()->paragraph,
            'prix' => fake()->randomFloat(2, 10, 1000),
            'categorie' => fake()->word,
            'statu' => fake()->boolean,


        ];
    }
    public function run()
    {
        \App\Models\Annonce::factory(10)->create();
    }
}
