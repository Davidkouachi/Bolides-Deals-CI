<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_formule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'formule_id',
        'nbre_mois',
        'date_fin',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function formule()
    {
        return $this->belongsTo(Formule::class, 'formule_id');
    }
}
