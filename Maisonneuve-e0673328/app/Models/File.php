<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
