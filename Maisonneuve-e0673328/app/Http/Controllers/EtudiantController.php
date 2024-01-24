<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{

    /**
     * Affiche la page de l'étudiant connecté
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant = Etudiant::find($etudiant->id);
        return view('user.show', compact('etudiant'));
    }

    /**
     * Affiche la page de modification de l'étudiant connecté
     */
    public function edit(Etudiant $etudiant)
    {
        return view('user.edit', compact('etudiant'));
        // À compléter
    }

    /**
     * Met à jour l'étudiant connecté
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // À compléter
    }

    /**
     * Supprime l'étudiant connecté
     */
    public function destroy(Etudiant $etudiant)
    {
        // À compléter
    }
}
