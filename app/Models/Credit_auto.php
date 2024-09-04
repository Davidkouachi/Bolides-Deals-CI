<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit_auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nbre_mois',
        'prix_apport',
        'prix_mois',
        'annonce_id',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
