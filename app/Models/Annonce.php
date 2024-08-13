<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'marque_id',
        'user_id',
        'model',
        'transmission',
        'type_carburant',
        'nbre_place',
        'version',
        'lieu',
        'couleur',
        'annee',
        'cylindre',
        'puiss_fiscal',
        'type_annonce',
        'prix',
        'immatriculation',
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
