<?php

namespace Database\Factories;

use App\Models\Ville;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_naissance' => $this->faker->date(),
            'villes_id' => Ville::all()->random()->id,
            'user_id' => User::all()->random()->id // ajout pour la relation
        ];
    }
}
