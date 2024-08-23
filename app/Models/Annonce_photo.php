<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'annonce_id',
        'image_nom',
        'image_chemin',
        'image_nbre',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
