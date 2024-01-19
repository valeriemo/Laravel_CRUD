<?php

namespace Database\Factories;

use App\Models\Ville;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->catchPhrase(),
            'titre_en' => $this->faker->catchPhrase(),
            'contenu' => $this->faker->text(400),
            'contenu_en' => $this->faker->realTextBetween($minNbChars = 80, $maxNbChars = 400),
            'date' => $this->faker->date('Y-m-d'),
            'user_id' => User::all()->random()->id // ajout pour la relation
        ];
    }
}
