<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp',
        'appel',
        'sms',
        'annonce_id',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
