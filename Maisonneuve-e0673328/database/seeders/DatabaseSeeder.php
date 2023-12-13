<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Ville;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $villes = \App\Models\Ville::factory(15)->create();
        // Je crée 100 étudiants et je les rattache à une ville deja existante
        $etudiants = \App\Models\Etudiant::factory(100)->recycle($villes)->create();
    }
}
