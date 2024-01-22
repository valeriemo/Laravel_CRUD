<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nom_en',
        'path',
        'user_id' 
    ];

    // ajout pour la relation avec le user
    public function fileHasUser()
    {
        return $this->hasOne('App\Models\User', 'id' , 'user_id');
    }
    
    static public function nomSelect()
    {
        // Récupérer la langue de la session
        $lang = session()->get('localeDB');    
        // Si la langue est définie à 'fr', ajuster la langue pour utiliser la version française
        if (session()->has('locale') && session()->get('locale') == 'En') {
            $lang = "_en";
        }
        // Utiliser DB::raw pour construire la requête SQL avec la bonne colonne
        return self::select('id',
            DB::raw("(CASE WHEN nom$lang IS NULL THEN nom ELSE nom$lang END) as nom")
        )->orderBy('id')->get();
    }

}
