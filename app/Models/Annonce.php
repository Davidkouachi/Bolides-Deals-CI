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
        'credit_auto',
        'credit_auto_mois',
        'prix_apport',
        'prix_mois',
        'marque_id',
        'user_id',
        'ville_id',
        'type_marque_id',
        'localisation',
        'model',
        'credit_auto',
        'transmission',
        'kilometrage',
        'type_carburant',
        'nbre_place',
        'neuf',
        'hors_taxe',
        'version',
        'couleur',
        'annee',
        'cylindre',
        'puiss_fiscal',
        'type_annonce',
        'prix',
        'description',
        'nbre_refresh',
        'date_refresh',
        'troc',
        'whatsapp',
        'appel',
        'sms',
        'uuid',
        'statut',
        'nbre_porte',
        'negociable',
        'nbre_cle',
        'visite_techn',
        'assurance',
        'papier',
        'views',
        'date_hors_ligne',
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
