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
        'ville_id',
        'Quartier',
        'model',
        'transmission',
        'type_carburant',
        'nbre_place',
        'version',
        'couleur',
        'annee',
        'cylindre',
        'puiss_fiscal',
        'type_annonce',
        'prix',
        'immatriculation',
        'description',
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }
}
