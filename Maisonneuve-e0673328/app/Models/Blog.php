<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
