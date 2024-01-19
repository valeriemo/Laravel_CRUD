<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'date_naissance',
        'ville_id',
        'user_id' 
    ];

    // ajout pour la relation avec Ville
    public function etudiantHasVille()
    {
        return $this->hasOne('App\Models\Ville', 'id' , 'ville_id');
    }

    // ajout pour la relation avec User
    public function etudiantHasUser()
    {
        return $this->hasOne('App\Models\User', 'id' , 'user_id');
    }

}
