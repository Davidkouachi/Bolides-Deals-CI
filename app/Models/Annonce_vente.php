<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_auto',
        'kilometrage',
        'hors_taxe',
        'troc',
        'negociable',
        'nbre_cle',
        'visite_techn',
        'assurance',
        'papier',
        'annonce_id',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
