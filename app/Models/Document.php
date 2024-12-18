<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'url',
        'demande_id',
        'type',
    ];
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
