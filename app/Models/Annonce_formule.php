<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_formule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nbre_photo',
        'duree_vie',
        'nbre_refresh',
        'tete_liste',
        'top_annonce',
        'annonce_id',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
