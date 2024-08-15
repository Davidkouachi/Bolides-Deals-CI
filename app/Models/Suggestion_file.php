<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion_file extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'suggestion_id',
        'file_nom',
        'file_chemin',
    ];

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class, 'suggestion_id');
    }
}
