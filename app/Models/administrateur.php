<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class administrateur extends Model
{
    protected $fillable = [
        'nom',
        'user_id',
        'service',
        'departement_id',
    ];
}
