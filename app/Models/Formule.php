<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nbre_photo',
        'duree_vie',
        'nbre_refresh',
        'badge',
        'tete_liste',
        'top_annonce',
        'stat',
        'nom',
        'couleur',
        'gratuit',
        'prix',
    ];
}
