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
        'email',
        'date_naissance',
        'ville_id',
        'user_id' 
    ];

    // ajout pour la relation avec User
    public function etudiantHasVille()
    {
        return $this->hasOne(Etudiant::class);
    }
    
    // ajout pour la relation avec Ville
    public function ville()
    {
        return $this->hasOne(Ville::class);
    }
}
