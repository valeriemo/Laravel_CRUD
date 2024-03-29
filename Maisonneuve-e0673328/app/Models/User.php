<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    // ajout pour la relation avec Etudiant 1-1
    public function userHasEtudiant()
    {
        return $this->belongsTo(Etudiant::class, 'user_id' , 'id');
    }

    // ajout pour la relation avec Blog 1-n
    public function userHasBlog()
    {
        return $this->hasMany(Blog::class, 'blog_id');
    }

    // ajout pour la relation avec File 1-n
    public function userHasFile()
    {
        return $this->hasMany(File::class, 'file_id');
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
