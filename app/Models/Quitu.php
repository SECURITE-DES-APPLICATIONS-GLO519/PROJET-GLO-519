<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quitu extends Model
{
    /** @use HasFactory<\Database\Factories\QuituFactory> */
    use HasFactory;

    protected $fillable = [
        'niveau',
        'annee',
        'url',
        'etudiant_id'
    ];
    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'demande_quituses', 'quitus_id', 'demande_id');
    }
}
