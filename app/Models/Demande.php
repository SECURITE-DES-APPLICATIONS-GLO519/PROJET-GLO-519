<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'etudiant_id',
        'type',
        'statut',
        'departement_id',
        'confirm_direction',
        'confirm_bibliotheque',
        'confirm_departement',
        'confirm_scolarite',
    ];
     // Relation avec Etudiant (Une demande appartient à un étudiant)
     public function etudiant()
     {
         return $this->belongsTo(Etudiant::class, 'etudiant_id');
     }
}
