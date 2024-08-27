<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nbre_jours_ligne',
        'nbre_jours_delete',
        'nbre_refresh',
    ];
}
