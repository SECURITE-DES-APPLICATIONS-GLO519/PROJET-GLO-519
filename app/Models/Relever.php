<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relever extends Model
{
    /** @use HasFactory<\Database\Factories\ReleverFactory> */
    use HasFactory;

    protected $fillable = [
        'niveau',
        'annee',
        'url',
        'etudiant_id'
    ];
}
