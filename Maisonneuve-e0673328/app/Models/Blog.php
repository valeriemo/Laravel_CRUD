<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_en',
        'contenu',
        'contenu_en',
        'date',
        'user_id' 
    ];

    // ajout pour la relation avec Etudiant
    public function blogHasUser()
    {
        return $this->hasOne(User::class, 'id' , 'user_id');
    }

    // Pour optimiser le code créer un blogRessource et l'appeler au lieu du model + ajoute le code qui verifie le language (prétraitement de donnee (pas de bloghasuser))
    /**
     * Récupérer le contenu de la colonne 'titre' ou 'titre_en' selon la langue de la session
     */
    static public function titreSelect()
    {
        // Récupérer la langue de la session
        $lang = session()->get('localeDB');    
        // Si la langue est définie à 'fr', ajuster la langue pour utiliser la version française
        if (session()->has('locale') && session()->get('locale') == 'En') {
            $lang = "_en";
        }
        // Utiliser DB::raw pour construire la requête SQL avec la bonne colonne
        return self::select('id',
            DB::raw("(CASE WHEN titre$lang IS NULL THEN titre ELSE titre$lang END) as titre")
        )->orderBy('id')->get();
    }

    /**
     * Récupérer le contenu de la colonne 'contenu' ou 'contenu_en' selon la langue de la session
     */
    static public function contenuSelect()
    {
        $lang = session()->get('localeDB');    
        if (session()->has('locale') && session()->get('locale') == 'En') {
            $lang = "_en";
        }
        return self::select('id',
            DB::raw("(CASE WHEN contenu$lang IS NULL THEN contenu ELSE contenu$lang END) as contenu")
        )->orderBy('id')->get();
    }
}

