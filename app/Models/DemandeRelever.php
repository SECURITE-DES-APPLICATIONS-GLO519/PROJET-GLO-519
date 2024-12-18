<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeRelever extends Model
{
    //
    protected $fillable = [
        'demande_id',
        'relever_id',
    ];
}
