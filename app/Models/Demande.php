<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

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

    public function quitus(){
        return $this->belongsToMany(Quitu::class, 'demande_quituses', 'demande_id', 'quitus_id'); 
    }

    public function relevers(){
        return $this->belongsToMany(Relever::class, 'demande_relevers', 'demande_id', 'relever_id'); 
    }
}
