<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'imm',
        'marque_id',
        'user_id',
        'ville_id',
        'type_marque_id',
        'localisation',
        'model',
        'transmission',
        'type_carburant',
        'nbre_place',
        'neuf',
        'version',
        'couleur',
        'annee',
        'cylindre',
        'puiss_fiscal',
        'type_annonce',
        'prix',
        'description',
        'uuid',
        'statut',
        'nbre_porte',
        'views',
        'date_hors_ligne',
        'refresh_nbre',
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

    public function type_marque()
    {
        return $this->belongsTo(Type_marque::class, 'type_marque_id');
    }
}
