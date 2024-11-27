<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
    protected $fillable = [
        'etudiant_id',
        'type',
        'statut',
        'departement_id',
        'direction',
        'bibliotheque',
        'departement',
        'scolarite',
    ];
}
