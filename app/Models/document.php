<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    protected $fillable = [
        'url',
        'demande_id',
        'type',
    ];
}
