<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    use HasFactory;

    use HasFactory;

    /**
     * Les champs qui peuvent être remplis en masse.
     */
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'niveau',
        'cycle',
        'user_id',
    ];

    /**
     * Relation : Un étudiant peut avoir plusieurs demandes.
     */
    public function demandes()
    {
        return $this->hasMany(Demande::class, 'etudiant_id');
    }
}
